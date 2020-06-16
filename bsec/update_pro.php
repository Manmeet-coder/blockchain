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
	
?>
<?php
    if(isset($_POST['Update']))
    {   
        $id = $_POST['id'];
        $price = $_POST['price'];
        $conn = new mysqli($servername, $username, $password,$dbname);
	  
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
        
		$sql='UPDATE `proplist` SET price = '.$price.' WHERE prop_id = '.$id.';';
		//echo ($sql);
		$runquery = mysqli_query($conn,$sql);
		if ($runquery) {
			//echo(($temp_fname.' .'.$file_name));
			echo '<script>alert("Property price updated successfully!");
				window.location="./owner.php";</script>';
		}
		else{
			$err_msg="Unable to update product";
			echo '<script>alert("' . $sql . '"); window.location="./owner.php";</script>';
		}
	}
	else{
		echo'<script>alert("Please login first.");
			window.location="../login.php";</script>';
	}
    
?>