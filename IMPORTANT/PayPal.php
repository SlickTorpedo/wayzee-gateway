<?php

namespace Pterodactyl\Models\Billing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Pterodactyl\Models\Billing\BillingLogs;

use Bill;

class PayPal extends Model
{
  use HasFactory;

  public $merchant_email;
  public $currency;
  public $paypal_test_mode = 0;
  public $paypal_url = 'https://nexussociety.net/payment-test';

  public function __construct()
  {
    $settings = Bill::settings()->getAll();
    $this->merchant_email = $settings['paypal_email'];
    $this->currency = $settings['paypal_currency'];

    if ($this->paypal_test_mode == 1) {
      $this->paypal_url = 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr';
    }
  }

  public function isTXN($txn)
  {
    $log = DB::table('billing_logs')->where('txn_id', $txn)->first();
    if (empty($log)) {
      return false;
    }
    return true;
  }

  public function updateBalance($user_id, $count, $param = '+')
  {
    if ($param == '+') {
      DB::table('billing_users')->where('user_id', $user_id)->increment('balance', $count);
    } elseif ($param == '-') {
      DB::table('billing_users')->where('user_id', $user_id)->decrement('balance', $count);
    }
  }

  public function listener()
  {

    $raw_post_data = file_get_contents('php://input');
    $raw_post_array = explode('&', $raw_post_data);

    $myPost = array();
    foreach ($raw_post_array as $keyval) {
      $keyval = explode('=', $keyval);
      if (count($keyval) == 2)
        $myPost[$keyval[0]] = urldecode($keyval[1]);
    }

    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    $get_magic_quotes_exists = false;
    if (function_exists('get_magic_quotes_gpc')) {
      $get_magic_quotes_exists = true;
    }

    foreach ($myPost as $key => $value) {
      if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
        $value = urlencode(stripslashes($value));
      } else {
        $value = urlencode($value);
      }
      $req .= "&$key=$value";
    }

    //Post IPN data back to paypal to validate

    $ch = curl_init($this->paypal_url);

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

    if (!($res = curl_exec($ch))) {
      curl_close($ch);
      exit;
    }
    curl_close($ch);

    //Inspect IPN validation result and act accordingly

    if (strcmp($res, "VERIFIED") == 0) {

      // assign posted variables to local variables
      $txn_id = $_REQUEST['txn_id'];
      $receiver_email = $_REQUEST['receiver_email'];
      $currency = $_REQUEST['mc_currency'];
      $payment_status = $_REQUEST['payment_status'];
      $user_id = $_REQUEST['item_number'];
      $count = $_REQUEST['mc_gross'];

      // check that txn_id has not been previously processed
      if ($this->isTXN($txn_id)) {
        DB::table('billing_logs')->where('txn_id', $txn_id)->update(array(
          'status' => 'VERIFIED/' . $payment_status,
          'data' => json_encode($_REQUEST),
        ));
        exit;
      } else {
        $log = new BillingLogs;
        $log->user_id = $user_id;
        $log->type = 'paypal';
        $log->txn_id = $txn_id;
        $log->status = 'VERIFIED/' . $payment_status;
        $log->data = json_encode($_REQUEST);
        $log->save();
      }

      // check that receiver_email is your Primary PayPal email
      if ($this->merchant_email == $receiver_email) {
        // check that payment_amount/payment_currency are correct
        if ($this->currency == $currency) {

          // process payment
          $this->updateBalance($user_id, $count, '+');

        }
      }
    }
    return;
  }

  public function generateForm($amount)
  {
    $amount = $amount + 1;
    echo
    '<body onload="document.redirectform.submit()">
        <form method="POST" action="https://nexussociety.net/payment-test/?amount='.$amount.'&uid=' . Auth::user()->id . '" name="redirectform">
        </form>
    </body>';
  }
}
