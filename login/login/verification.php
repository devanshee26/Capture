<?php

	if(isset($_POST['codebutton']))
	{
		$code=$_POST['code'];
		echo $code;
			header('location:changepassword.php');
	}
		else
		{	
			echo "<h3>Enter Valid Code";
		}
	
?>