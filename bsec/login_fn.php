<?php
   include("common.php");
   session_start();
   print_r($_POST); 
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = ($_POST['uname']);
      $mypassword = ($_POST['psw']); 
      
      $sql = "SELECT uname, usertype FROM user WHERE email = '$myusername' and password = '$mypassword'";
	  
	  echo $sql;
	  $conn = new mysqli($servername, $username, $password,$dbname);
	  
	  if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
	  } 
	  
	  
      $result = $conn->query($sql);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if(isset($result->num_rows) && $result->num_rows > 0) {
		 $row = $result->fetch_assoc();
		 $usertype= $row['usertype'];
         $_SESSION['login_user'] = $myusername;
		 $_SESSION['usertype']=$usertype;
		 $_SESSION['status']=true;
         if($usertype==='owner')
			header("location: owner.php");
		 else
			header("location: tenant.php"); 
      }else {
         $error = "Your Login Name or Password is invalid";
		 echo $error;
      }
   }
?>