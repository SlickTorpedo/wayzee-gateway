<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Setup Page</title>

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
          <a class="navbar-brand" href="https://nexussociety.net">
            <span>
              Setup
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
          Homepage
        </h2>
      </div>

      <div class="service_container">
        <div class="box active">
          <div class="img-box">
            <img src="https://nexussociety.net/payment-test/imhg/warn.png" class="img1" alt="">
            <img src="https://nexussociety.net/payment-test/imhg/warn.png" class="img2" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Please enter your home page
            </h5>
            <p>
              <form action="setup4" method="get">
              <input type="text" name="homepage"><br><br>
              <input type="submit">
              </form>
            <br>If you're using the portal as your main<br>homepage, just use https://panel.yoursite.com
            </p>
          </div>
        </div>
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
              Program Created By Slick_Torpedo
              <a href="https://nexussociety.net/">(Click)</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- footer section -->

  </div>



  <script type="text/javascript" src="https://nexussociety.net/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="https://nexussociety.net/js/bootstrap.js"></script>

</body>

<?php

$filepath = 'paypaltoken.txt';

if (file_exists($filepath)) {
  echo "Your paypaltoken.txt file already exists! The existing changes won't be saved! If you want to save them, delete paypaltoken.txt in the https://yoursite.com/setup1/setup2/setup3 directory!";
  die();
}


$panelurl = htmlspecialchars($_GET['paypaltoken']);

$txt = $panelurl;

$myfile = fopen("paypaltoken.txt", "w") or die("Unable to open / generate config file!");
fwrite($myfile, $txt);
fclose($myfile);
?>

</html>
