<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <?php
  $siteurl = $_SERVER['HTTP_HOST'];
  ?>
  <body>
    
  </body>
  
<?php
$fpcff = file_get_contents('./protectedintfilekey.txt', FILE_USE_INCLUDE_PATH);
if ($fpcff == $_GET['privkey']) {
  	 $file = './protectedintfilekey.txt';
     $remove = $_GET['privkey'];
  	 remove_line($file, $remove);
	 $servername = "0.0.0.0";
	 $username = "username";
	 $password = "password";
	 $dbname = "panel";
  
	 $conn = mysqli_connect($servername, $username, $password, $dbname);
  
	 if (!$conn) {
  	 	die("Connection failed: " . mysqli_connect_error());
	 }

	 $amount = mysqli_real_escape_string($conn, $_GET["varamt"]);
	 $amount = $amount - 5318;
	 $uid = mysqli_real_escape_string($conn, $_GET["id"]);
	 $sql = "UPDATE billing_users SET balance = balance + $amount where user_id = '$uid';";
	 $result = mysqli_query($conn, $sql);

	 mysqli_close($conn);
  	 echo 'Token Validated! Redirecting you now!';
	 }

function remove_line($file, $remove) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    foreach($lines as $key => $line) {
        if($line === $remove) unset($lines[$key]);
    }
    $data = implode(PHP_EOL, $lines);
    file_put_contents($file, $data);
}
?>
  
  
<?php
header("Location: $siteurl/payment-gateway/confirm.php?amountpaid=$amount&userid=$uid");
?>
