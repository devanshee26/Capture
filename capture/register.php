<html>
<head>
    <title>Register | Capture</title>
</head>
<body>
    <form action="#" method=post>
        Username : <input type="text" name="uname"><br>
        Password : <input type="password" name="password"><br>
        Confirm Password : <input type="password" name="cpassword"><br>
        email : <input type="text" name="email"><br>
        <input type="submit" name="register">
    </form>
</body>
</html>

<?php
    if(isset($_POST['register'])){
        try{
            $user_image = rand(1,12).".png";
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $repass=$_POST['cpassword'];
             if($password==$repass)
           { 
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql="insert into users (username,user_email,user_password,user_image) values ('$uname','$email','$password','$user_image')";
            $query=$dbhandler->query($sql);
            echo "Data is inserted successfully";
            header("Location:login.php");
            }
     else {
        header("Location:register.php");
     }
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
    }
?>