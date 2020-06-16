<?php
    include "common.php";
	session_start();
	if(isset($_SESSION['status']))
	{
		if($_SESSION['usertype']==='owner')
			header("Location:owner.php");
	}
	else
	{
		header("Location:index.php");
	}
	//print_r($_POST);
	
    if(isset($_POST['Rent']))
    {   
		$email = $_SESSION['login_user'];
		$prop_id=$_POST['id'];
        //$location = $_POST['location'];
		//$type = $_POST['type'];
        //$price = $_POST['price'];
		//$temp_fname=$_FILES["image"]["tmp_name"];
		//$file_name="./assets/".str_replace(" ","_",$location).$email.".png";
		
		$conn = new mysqli($servername, $username, $password,$dbname);
	  
		  if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		  } 
        
		$sql = "INSERT INTO `reqlist` (`prop_id`,`email`)
			VALUES($prop_id,'$email');";
		echo ($sql);
		$runquery = mysqli_query($conn,$sql);
		if ($runquery) {
			//echo(($temp_fname.' .'.$file_name));
			echo '<script>alert("Property added successfully!");
				window.location="./owner.php";</script>';
			move_uploaded_file($temp_fname,$file_name);
			$con->close();
		}
		else{
			$err_msg="Unable to add Property";
			echo ($runquery);
			//echo '<script>alert("' . $err_msg . '"); window.location="../admin_home.php";</script>';
		}
	}
	else{
		echo'<script>alert("Please login first.");
			window.location="./login.php";</script>';
	}
   
?>