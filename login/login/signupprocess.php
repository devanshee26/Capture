<?php
    if(isset($_POST['register'])){
        try{
            $user_image = rand(1,12).".png";
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="insert into users (username,user_email,user_password,user_image) values ('$uname','$email','$password','$user_image')";
            $query=$dbhandler->query($sql);
            header("Location:index.html");
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
    }
?>