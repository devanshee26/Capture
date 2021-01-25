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
        <title> Single | Share </title>
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
            <?php include 'aside.php';?>
            <div id="colorlib-main">
                <section class="ftco-section bg-light ftco-bread">
                    <div class="container">
                        <div class="row no-gutters slider-text align-items-center">
                            <div class="col-md-9 ftco-animate">
                                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.php">Blog</a></span> <span>Blog single</span></p>
                                <h1 class="mb-3 bread">“Opportunities don't happen, you create them.”</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pid=$_GET['id'];
                $_SESSION['pid']=$pid;
                $content=$dbhandler->query("select uid,category,picture,description from picture_details where pid=$pid");
                while($col2=$content->fetch())
                {
                	$uidisplay=$col2['uid'];
                	$picture=$col2['picture'];
                	$userdisplay=$dbhandler->query("select username from users where id=$uidisplay ");
                	while($cud=$userdisplay->fetch())
                	{

                ?>
                <section class="ftco-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 ftco-animate">
                                <h2 class="mb-3 font-weight-bold"><?php echo $col2['category']; ?> By <?php echo $cud['username'];?></h2>
                                <img src="upload/<?php echo $picture; ?>" alt="" class="img-fluid">
                                </p>
                                <p><?php echo $col2['description'];?></p>
                                <?php } }?>
                                <h2 class="mb-3 font-weight-bold" style="margin-top: 30px;"><img width="50px" height="50px" src="upload/icons/comment (1).png">Comments:</h2>
                                <?php 
	                                $cpid=$_SESSION['pid'];
	                                $qry=$dbhandler->query("select pid,uid,message from comment where pid=$cpid");
	                                while($col3=$qry->fetch())
	                                {
	                                $com=$col3['message'];
	                                $cuid=$col3['uid'];
	                                $display=$dbhandler->query("select username from users where id=$cuid");
	                                while($col4=$display->fetch())
	                                {
                                ?>
                                <div class="about-author d-flex p-4 bg-light" style="margin-top: 50px;">
                                    <div class="desc">
                                        <h3><?php echo $col4['username'];?> </h3>
                                        <p><?php echo $col3['message'];?></p>
                                    </div>
                                </div>

                                <?php  } }?>

                                <?php 
                                	$user=$dbhandler->query("select user_email,username,user_image from users where id=$uid");
			       					while($col=$user->fetch())
			        				{
			        					$_SESSION['username']=$col['username'];
			        					$_SESSION['email']=$col['user_email'];
			        				}
                                ?>
                                <div class="comment-form-wrap pt-5">
                                    <h3 class="mb-5">Leave a comment</h3>
                                    <form action="comment.php" method="post" class="p-3 p-md-5 bg-light">
                                        <div class="form-group">
                                            <label for="name">Username *</label>
                                            <input type="text" class="form-control" name="username" id="name" value='<?php echo $_SESSION['username'];?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" name="email" id="email" value='<?php echo $_SESSION['email']; ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea  id="message" cols="30" rows="10" name="comment" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary" name="commentbtn">
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

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
