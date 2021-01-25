<?php
	session_start();
	if(isset($_POST['commentbtn']))
	{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pid=$_SESSION['pid'];
    $uid=$_SESSION['uid'];
    if(isset($_POST['comment'])){
    $comment=$_POST['comment'];
	}
	else
	{
		echo "error";
	}
	$sql="insert into comment (uid,pid,message) values($uid,$pid,'$comment')";
	$dbhandler->query($sql);
	echo '<script type="text/javascript">'; 
	echo 'alert("Your comment is taken into consideration");'; 
	echo 'window.location.href = "blog.php";';
	echo '</script>';
	//header("location:blog.php");
}
?>