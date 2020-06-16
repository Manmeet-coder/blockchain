<?php 
include 'common.php';
print_r($_POST); 
$n=48; 

$passkey=genKey($n);
echo ($passkey.'<br/>');

$cipher=encryptthis("Jt1p#kcn;_",$passkey);
echo ($cipher.'<br/>');

echo (decryptthis($cipher,$passkey).'<br/>');


if($_POST['psw']==$_POST['psw-repeat'])
{
	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);
	$email=$_POST['email'];
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "insert into Keygen (email, passkey)values('".$email."', '".$passkey."')";
	if ($conn->query($sql) === FALSE) {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  echo '<script>alert("Unable to create user")</script>';
	}
	else
	{
		$conn->close();
		
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);
		$name=$_POST['name'];
		$phno=$_POST['phno'];
		$accno=$_POST['accno'];
		$psw=$_POST['psw'];
		$type=$_POST['type'];
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "insert into user (uname, email, phno, accno, password, usertype)values('".$name."', '".$email."', '".encryptthis($phno,$passkey)."', '".encryptthis($accno,$passkey)."', '".$psw."', '".$type."')";
		if ($conn->query($sql) === FALSE) {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		  echo '<script>alert("Unable to create user")</script>';
		}
		else{
			echo '<script>alert("User created successfully")</script>';
		}
		$conn->close();
	}
	header("Location: ./login.php");
	print($sql);
	
}
else{
	print('<script>alert("Both password must be same!");</script>');
}
 

?>