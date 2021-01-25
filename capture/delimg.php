<?php
session_start();
$pid=$_GET['id'];
		try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sharedb', 'root', '');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
                  $delquery=$dbhandler->query("delete from `picture_details` where `pid`=$pid");
                  
                  		header("location:gallery.php");	
                  
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
                  
 ?>