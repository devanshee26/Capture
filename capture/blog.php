<?php
	session_start();
    if(isset($_SESSION['uid'])){
        $uid=$_SESSION['uid'];

    }
    else
    {
      header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog | Share</title>
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
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
	            <h1 class="mb-3 bread">Read Our Articles</h1>
	            <p>Explore what your frineds are thinking about the every picture that they have captured and do share your thoughts by giving a like!.</p>
	          </div>
	        </div>
				</div>
			</section>
			<section class="ftco-section">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="row">
                        <?php  
                                
                            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
                            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query1=$dbhandler->query("select user_two from friends where user_one=$uid");
                            while($col1=$query1->fetch())
                            {
                                $fid=$col1['user_two'];
                                $query2 = $dbhandler->query("select pid,category,location,caption,month,picture,like_image from picture_details where uid=$fid");
                                while($col2=$query2->fetch()){
                                $image = $col2['picture'];
                                $pid=$col2['pid'];
                                $like=$col2['like_image'];
                                $month=$col2['month'];
                                $category=$col2['category'];
                                $image_src = "upload/".$image;
                                $location=$col2['location'];
                                $cap=$col2['caption'];
                                $user=$dbhandler->query("select username from users where id=$fid");
                                while($col3=$user->fetch())
                                {

                        ?>
			    			<div class="col-md-4">
			    				<div class="blog-entry ftco-animate">
										<a href="single.php?id=<?php echo $pid;?>" class="img img-2" style="background-image: url('<?php echo $image_src ?>');"></a>
										<div class="text text-2 pt-2 mt-3">
				              <h3 class="mb-2"><a href="single.php?id=<?php echo $pid;?>"><?php echo $col3['username'];?></a></h3><span><?php echo $like;?> Likes</span>
				              <div class="meta-wrap">
												<p class="meta">
                          <span><a href="single.php?id=<?php echo $pid;?>"><?php echo $category; ?></a></span><br>
				              		<span><?php echo $month; ?></span>
                          <span><?php echo $location; ?></span>
				              		
				              	</p>
			              	</div>
				              <p class="mb-4">Captions<br><?php echo $cap;?></p>
                      <a href='like.php?id=<?php echo $pid; ?>'><span><img src='upload/icons/like (1).png'></span></a>
				            </div>
									</div>
			    			</div>
			    			<?php 
                      } 
                    }
                  }
                  ?>
			    		</div><!-- END-->
			    		
			    	</div>
	          </div><!-- END COL -->
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