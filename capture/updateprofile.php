<?php
	session_start();
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $uid=$_SESSION['uid'];
	if(isset($_POST['update'])){
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) {
    		$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		}; 
		$image_name = addslashes($_FILES['image']['name']);
		$sql="update users set `username`='$username',`user_email`='$email',`user_password`='$password',`user_image`='$image_name' where id=$uid";
        $qry=$dbhandler->query($sql);
        echo $image_name;
		$name = $_FILES['image']['name'];
		$target_dir = "upload/profile/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		// Upload file
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name))
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Profile Updated Successfully");'; 
			echo 'window.location.href = "profile.php";';
			echo '</script>';
		}
		else
		{
			echo "<h1>Try Again</h1>";
		}

	}
?>