<?php 
	session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pid=$_GET['id'];
    $qry="update `picture_details` set `like_image`=`like_image` + 1 where pid=$pid";
    echo $qry;
    $dbhandler->query($qry);
    $_SESSION['like']="yes";
    header("location:blog.php?id=$pid");
?>
                            