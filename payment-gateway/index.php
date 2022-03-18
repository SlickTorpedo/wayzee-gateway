<!DOCTYPE html>
<html>

<head>
  <?php
  $siteurl = $_SERVER['HTTP_HOST'];
  
  $sitenamecurl = "http://$siteurl/setup/setup1/sitename.txt";
  
  $panelurlcurl = "http://$siteurl/setup/setup1/setup2/panelurl.txt";
  
  $homeurlcurl = "http://$siteurl/setup/setup1/setup2/setup3/setup4/panelurl.txt";
  
  $paypaltokencurl = "http://$siteurl/setup/setup1/setup2/setup3/paypaltoken.txt";
  
  
  $ci = curl_init();
  curl_setopt($ci, CURLOPT_URL, $sitenamecurl);
  curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
  $sitename = curl_exec($ci);
  curl_close($ci);
  
  $ci = curl_init();
  curl_setopt($ci, CURLOPT_URL, $panelurlcurl);
  curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
  $panelurl = curl_exec($ci);
  curl_close($ci);
  
  $ci = curl_init();
  curl_setopt($ci, CURLOPT_URL, $homeurlcurl);
  curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
  $homeurl = curl_exec($ci);
  curl_close($ci);
  
  $ci = curl_init();
  curl_setopt($ci, CURLOPT_URL, $paypaltokencurl);
  curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
  $paypaltoken = curl_exec($ci);
  curl_close($ci);
  
  if (isset($sitename)) {
    $sitename = $sitename;
  } else {
    $sitename = "RUN INSTALLATION!";
  }
  
  if (isset($homeurl)) {
    $homeurl = $homeurl;
  } else {
    $homeurl = "RUN INSTALLATION!";
  }
  
  if (isset($paypaltoken)) {
    $paypaltoken = $paypaltoken;
  } else {
    $paypaltoken = "RUN INSTALLATION!";
  }
  
  if (isset($panelurl)) {
    $panelurl = $panelurl;
  } else {
    $panelurl = "RUN INSTALLATION!";
  }
  
  $id = htmlspecialchars($_GET['id']);
  ?>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo $sitename; ?> - Payment Confirmed</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="https://nexussociety.net/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="https://nexussociety.net/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="https://nexussociety.net/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="<?php echo "$homeurl"; ?>">
            <span>
              Payment Confirmed
            </span>
          </a>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo "$homeurl"; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          PURCHASE SUCCESSFUL!<br><em>You're amazing thank you :)</em>
        </h2>
      </div>

      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="https://nexussociety.net/payment-test/imhg/question-mark.png" class="img1" alt="">
            <img src="https://nexussociety.net/payment-test/imhg/question-mark.png" class="img2" alt="">
          </div>
          <div class="detail-box">
            <h5>
              What did I just buy?
            </h5>
            <p>
              When you purchase account credits you are adding them to your account balance. You can now use these credits to purchase servers!
            </p>
          </div>
        </div>
        <div class="box active">
          <div class="img-box">
            <img src="https://nexussociety.net/payment-test/imhg/warn.png" class="img1" alt="">
            <img src="https://nexussociety.net/payment-test/imhg/warn.png" class="img2" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Oh crap... undo that please!
            </h5>
            <p>
              If you accidentally made a purchase that you didn't mean to or changed your mind, you can always contact our support team! Just click <a href="<?php echo "$homeurl/support"; ?>">this link</a> and we will take you there!
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="https://nexussociety.net/payment-test/imhg/money-bag.png" class="img1" alt="">
            <img src="https://nexussociety.net/payment-test/imhg/money-bag.png" class="img2" alt="">
          </div>
          <div class="detail-box">
            <h5>
              How much are these credits worth?
            </h5>
            <p>
              For every single credit you buy, you purchase $1 worth of USD. You can view your credits by clicking <a href="<?php echo "$homeurl/check-balance"; ?>">here</a>.
            </p>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="<?php echo "$panelurl/billing/balance"; ?>">
          WANT... MORE... CREDITS!
        </a>
      </div>
    </div>
  </section>
  <!-- end service section -->

  <div class="footer_bg">


    <!-- footer section -->
    <section class="container-fluid footer_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-9 mx-auto">
            <p>
              &copy; 2022 All Rights Reserved By
              <a href="<?php echo "$homeurl"; ?>"><?php echo $sitename; ?></a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- footer section -->

  </div>



  <script type="text/javascript" src="https://nexussociety.net/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="https://nexussociety.net/js/bootstrap.js"></script>
  <?php
  $amount = htmlspecialchars($_GET['amountpaid']);
  $uid = htmlspecialchars($_GET['userid']);
  ?>

</body>

</html>
