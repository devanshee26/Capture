<?php
  session_start();
    if(isset($_SESSION['uid'])){
        $uid=$_SESSION['uid'];
        
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $dbhandler->query("select * from users where `id`=$uid");
            $col=$query->fetch();
            $uname=$col[1];
            $_SESSION['uname']=$uname;
      }
?>
<html lang="en">
  <head>
    <title>Gallery | Share</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include'aside.php';?>
    <div id="colorlib-main">
        <section class="ftco-section bg-light ftco-bread">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center">
	          <div class="col-md-9 ftco-animate">
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Gallery</span></p>
	            <h1 class="mb-3 bread">Galleries</h1>
                <p>Taking an image, Freezing the moment, tells you how rich your photograpy is:).</p>
                <p>Your Pictures</p>
	          </div>
	        </div>
				</div>
			</section>
			<section class="ftco-section-2">
        <div class='photograhy'>
          <div class='row no-gutters'>
            <?php
                
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query2 = $dbhandler->query("select pid,caption,month,picture from picture_details where uid='$uid' ");
                while($col2=$query2->fetch()){
                    $image = $col2['picture'];
                    $pid=$col2['pid'];
                    $image_src = "upload/".$image;
						echo "<div class='col-md-4 ftco-animate' style='padding-right:8px; '>";
							echo "<a href='$image_src' class='photography-entry img image-popup d-flex justify-content-center align-items-center' style='background-image: url($image_src); border:2px solid gray;'>";
								echo "<div class='overlay'></div>";
								echo "<div class='text text-center'>";
									echo "<h3>".$uname."</h3>";
									echo "<span class='tag'>".$col2['caption']."</span><br>";
                  echo "<span class='tag'>".$col2['month']."</span><br>";
								echo "</div>";
							echo "</a>";
              echo "<a href='delimg.php?id=$pid'><input type='submit' value='Delete' name='delete'></a>";

						echo "</div>";
						
                }
            
            ?>
          </div>
        </div>
            </section>
	    </div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
