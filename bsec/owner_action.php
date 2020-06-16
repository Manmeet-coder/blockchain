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
				window.location="./owner.php";</script>';
			move_uploaded_file($temp_fname,$file_name);
			$con->close();
		}
		else{
			$err_msg="Unable to delete request";
			echo ($runquery);
			//echo '<script>alert("' . $err_msg . '"); window.location="../admin_home.php";</script>';
		}
	}
	elseif(isset($_POST['Accept']))
    { 
		$email = $_SESSION['login_user'];
		$req_id=$_POST['id'];
		$prop_id=$_POST['prop_id'];
		$tenant=$_POST['tenant'];
		
		echo '<script>alert("Request accepted successfully!");
				window.location="./owner.php";</script>';
				
		$conn = new mysqli($servername, $username, $password,$dbname);
	  
		  if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		  } 
        
		$sql = "INSERT INTO `rent_agreement` (`prop_id`,`rent_owner`,`rent_tenant`) 
			VALUES('$prop_id', '$email','$tenant');";
		//echo ($sql);
		$runquery = mysqli_query($conn,$sql);
		if ($runquery) {
			//echo(($temp_fname.' .'.$file_name));
			
			echo '<script>alert("Agreement created successfully!");
				window.location="./owner.php";</script>';
			move_uploaded_file($temp_fname,$file_name);
			
			$sql = "Delete from reqlist where req_id=".$req_id;
			echo ($sql);
			$runquery = mysqli_query($conn,$sql);
			if ($runquery) {
				$sql = "SELECT max(rent_id) as id FROM rent_agreement";
				$result = $conn->query($sql);
				if(isset($result->num_rows) && $result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$file_name= $row['id'];
				}
				
				$arg=' 1 '.$file_name.'.db '.'Owner= '.$email.' | Tenant= '.$tenant;
				$command = escapeshellcmd('C:\Users\manme\PycharmProjects\Blocksec\venv\Scripts\python  C:\xampp\htdocs\bsec\blockchain.py'.$arg);
				shell_exec($command);
				
				//echo(($temp_fname.' .'.$file_name));
				echo '<script>alert("Request deleted successfully!");
					window.location="./owner.php";</script>';
				//move_uploaded_file($temp_fname,$file_name);
				$con->close();
			}
			else{
				$err_msg="Unable to delete request";
				echo ($runquery);
				//echo '<script>alert("' . $err_msg . '"); window.location="../admin_home.php";</script>';
			}
			$con->close();
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