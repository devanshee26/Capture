<?php
    if(isset($_POST['register'])){
        try{
            $user_image = rand(1,12).".png";
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if(!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) {
                $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            }; //SQL Injection defence!
            $name = $_FILES['image']['name'];
            $image_name = addslashes($_FILES['image']['name']);
            $sql="insert into users (username,user_email,user_password,user_image) values ('$uname','$email','$password','$image_name')";
            $qry=$dbhandler->query($sql);
            $target_dir = "../../capture/upload/profile/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
        // Upload file
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name))
            {
                header("Location:index.html");
            }
            else
            {
                echo "error";
            }
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
    }
?>