<?php
	if(isset($_POST['update']))
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		try{
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb','root','');
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update users set user_password='$pass' where user_email='$email'";
        $query=$dbhandler->query($sql);
        header("location:index.html");
    	}
	    catch(PDOException $e){
	        echo $e->getMessage();
	        die();
	    }
    }
?>