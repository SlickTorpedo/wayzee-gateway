<!DOCTYPE html>
<html>

<head>
  <?php
    $nsvar = htmlspecialchars($_GET['id']);
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

  <title>Nexus Hosting - Purchase</title>

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
              Purchase Credits
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
                  <a class="nav-link" href="https://nexussociety.net">Home <span class="sr-only">(current)</span></a>
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
          Choose your payment method
        </h2>
      </div>

      <div class="service_container">
        <div class="box active">
          <?php
    		$amount = htmlspecialchars($_GET['amount']);
    		if ($amount >=0)
    		{
      		$amount = $amount - 1;
    		} else {
      		$amount = 1;
    		}
          	$nsrandvar = $amount + 5318;
			?>
          	<input type="hidden" id="myText" value="<?php echo $amount ?>">
          Purchasing <strong><?php echo $amount ?></strong> Account Credits<br><br>
    		<!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
    		<script src="https://www.paypal.com/sdk/js?client-id=Acy7nAM59-KEyI0qRKkWKEyisj2MUpPhHXTx0Bz0FxYnWnRPPIer3hhOontD0YaWhuqi1FjsBImgXJY2&currency=USD"></script>

    		<!-- Set up a container element for the button -->
    		<div id="paypal-button-container"></div>

    		<script>
      		function myFunction() {
 				var x = document.getElementById("myText").value;
        		return x;
	  		}
      
      		paypal.Buttons({
        		// Sets up the transaction when a payment button is clicked
        		createOrder: function(data, actions) {
          		return actions.order.create({
            		purchase_units: [{
              		amount: {
                		value: myFunction() // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              		}
            		}]
          		});
        		},

        		// Finalize the transaction after payer approval
        		onApprove: function(data, actions) {
          		return actions.order.capture().then(function(orderData) {
            		var element = document.getElementById('paypal-button-container');
            		//element.innerHTML = '';
            		//element.innerHTML = '<h3>Payment successful. Redirecting now!</h3>';
                  	<?php
					function generateRandomString($length = 50) {
    					return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
					}

					$myfile = fopen("protectedintfilekey.txt", "w") or die("Unable to open file!");
					$txt = generateRandomString();
					fwrite($myfile, $txt);
					fclose($myfile);
  					?>
           			actions.redirect('https://nexussociety.net/payment-test/redirecting.php?id=<?php echo htmlspecialchars($_GET['uid']); ?>&varamt=<?php echo $nsrandvar ?>&privkey=<?php echo $txt ?>');
            		//location.href = 'https://nexussociety.net/payment-test/confirm.php?id= + transaction.id';
          		});
        		}
      		}).render('#paypal-button-container');

    		</script>
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
              <a href="https://nexussociety.net/">NexusSociety</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- footer section -->

  </div>



  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>
