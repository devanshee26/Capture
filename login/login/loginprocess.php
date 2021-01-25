<?php
    if(isset($_POST['login'])){
        
    	$email=$_POST['email'];
    	$pass=$_POST['password'];
        try {
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $dbhandler->query("SELECT * FROM `users` WHERE `user_password`='$pass' AND `user_email`='$email'");
               $flag=0;
             if ($col = $query->fetch()) { 
                 	echo $email;
                    $flag=1;
                     $uid=$col[0];
                     session_start();
                     $_SESSION['uid'] = $uid;
                     $_SESSION['email']=$email;
               if($flag=1){ 
                    header("location:../../capture/index.php");
                 }
                else{
                     header("location:index.html");
                 }
            }
            else
            {
                header("location:index.html");
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
?>