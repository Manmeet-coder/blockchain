<?php
    include "common.php";
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("Location:index.php");
	}
	//print_r($_POST);
	
    if(isset($_POST['Del']))
    {   
		$email = $_SESSION['login_user'];
		$req_id=$_POST['id'];
        //$location = $_POST['location'];
		//$type = $_POST['type'];
        //$price = $_POST['price'];
		//$temp_fname=$_FILES["image"]["tmp_name"];
		//$file_name="./assets/".str_replace(" ","_",$location).$email.".png";
		
		$conn = new mysqli($servername, $username, $password,$dbname);
	  
		  if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		  } 
        
		$sql = "Delete from reqlist where req_id=".$req_id;
		echo ($sql);
		$runquery = mysqli_query($conn,$sql);
		if ($runquery) {
			//echo(($temp_fname.' .'.$file_name));
			echo '<script>alert("Request deleted successfully!");
				window.location="./tenant.php";</script>';
			move_uploaded_file($temp_fname,$file_name);
			$con->close();
		}
		else{
			$err_msg="Unable to delete request";
			echo ($runquery);
			//echo '<script>alert("' . $err_msg . '"); window.location="../admin_home.php";</script>';
		}
	}
	else{
		echo'<script>alert("Please login first.");
			window.location="./login.php";</script>';
	}
   
?>