<?php
	session_start();
if(isset($_POST['sendcode']))
	{
		$email=$_POST['email'];
		$subject="Verification code to change password";
		$code=rand(1000,5000);
		$_SESSION['code']=$code;
		$msg="code is ".$code;
	require 'phpmailer/PHPMailerAutoload.php';
	$mail=new PHPMailer;
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username='share.devansheemansi.team@gmail.com';
	$mail->Password='devanshee_mansi123';
	$mail->setFrom('share.devansheemansi.team@gmail.com');
	$mail->addAddress($email);
	$mail->isHTML();
	$mail->Subject=$subject;
	$mail->Body='<h1>Share Photosharing website</h1><br><h3>Your '.$msg.'</h1><br><h4>Have a nice day</h4>';
	if(!$mail->send())
	{
		echo "Error";
	}
	else
	{
		header("location:verifycode.php");
	}
	
	}
?>
