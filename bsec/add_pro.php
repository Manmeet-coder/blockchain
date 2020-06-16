<?php
    include "common.php";
	session_start();
	if(isset($_SESSION['status']))
	{
		if($_SESSION['usertype']==='tenant')
			header("Location:tenant.php");
	}
	else
	{
		header("Location:index.php");
	}
	//print_r($_POST);
	
    if(isset($_POST['add']))
    {   
		$email = $_SESSION['login_user'];
        $location = $_POST['location'];
		$type = $_POST['type'];
		$level = $_POST['level'];
        $price = $_POST['price'];
		$temp_fname=$_FILES["image"]["tmp_name"];
		$file_name="./assets/".str_replace(" ","_",$location).$email.".png";
		
		$conn = new mysqli($servername, $username, $password,$dbname);
	  
		  if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		  } 
        
		$sql = "INSERT INTO `proplist` (`email`,`location`,`type`,`level`,`price`, `state`, `file_name`) 
			VALUES('$email','$location','$type','$level','$price', 'new', '$file_name');";
		echo ($sql);
		$runquery = mysqli_query($conn,$sql);
		if ($runquery) {
			//echo(($temp_fname.' .'.$file_name));
			echo '<script>alert("Product added successfully!");
				window.location="./owner.php";</script>';
			move_uploaded_file($temp_fname,$file_name);
			$con->close();
			$arg=' 1 test.db ABC DEF';
			$command = escapeshellcmd('C:\Users\Krazzy\PycharmProjects\BlockSec\venv\Scripts\python3 C:\xampp\htdocs\bsec\blockchain.py', $arg);
			$output = shell_exec($command);
			echo($output);
		}
		else{
			$err_msg="Unable to add product";
			echo ($runquery);
			//echo '<script>alert("' . $err_msg . '"); window.location="../admin_home.php";</script>';
		}
	}
	else{
		echo'<script>alert("Please login first.");
			window.location="./login.php";</script>';
	}
   
?>