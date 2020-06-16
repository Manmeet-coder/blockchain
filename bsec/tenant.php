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
	
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--external CSS link-->
	<link rel="stylesheet" type="text/css" href="./style/bsec_style.css">
	<!--page title-->
	<title>Block Security</title>
</head>
<body>
	<!--menu section-->
	<ul class="menu_item">
	  <li><a class="select" href="index.php">Home</a></li>
	  <li><a href="About.html">About</a></li>
	  <li class="login"><a href="logout.php">Logout</a></li>
	</ul>
	<!--page banner for the page logo-->
	<div class="banner">
	  <a href="index.php">
		 <br/><br/><center><h1>Block Security</h1></center><br/><br/>
	  </a>
	</div>
	<!--section for left blank space-->
	<div style="overflow:auto">
	  <div class="left">
		 &nbsp;
	  </div>
	  <!--main vody section-->
	  <div class="main">
		<h1>Welcome <?php echo $_SESSION['login_user'].' (User role: '.$_SESSION['usertype'].')'?></h1>
		<caption><h3>Available Properties</h3></caption>
					<hr></hr>
					<table>
					  <thead>
						<tr>
						  <th scope="col">Image</th>
						  <th scope="col">Property Location</th>
						  <th scope="col">Property Type</th>
						  <th scope="col">Level</th>
						  <th scope="col">Rent Amount</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php
						$conn = new mysqli($servername, $username, $password,$dbname);
	  
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
						$sql='SELECT * FROM `proplist` ;';          
						$counter = 0;
						if($query = mysqli_query($conn, $sql))
						{
							while($row = mysqli_fetch_array($query)) 
							{ 	
								$location = $row["location"];
								$id = $row["prop_id"];
								$type = $row["type"];
								$level = $row["level"];
								$price = $row["price"];
								$file_name =$row["file_name"];
					  ?>
						<tr>
							<form action="req_pro.php" method="post" enctype="multipart/form-data">
							  <input type="hidden" name="id" value="<?php echo($id);?>">
							  <td data-label="image"><img src="<?php echo($file_name);?>" height="42" width="42"> </td>
							  <td data-label="name"><?php echo($location);?></td>
							  <td data-label="type"><?php echo($type);?></td>
							  <td data-label="level"><?php echo($level);?></td>
							  <td data-label="price"><?php echo($price);?></td>
							  <td data-label="update"><input type="submit" name="Rent" value="Rent Request"></td>  
							</form>
						</tr>
						<?php }}?>
					  </tbody>
					</table>
		<br/><br/>			
		<caption><h3>My Requested Properties</h3></caption>
		<hr></hr>
		<table>
		  <thead>
			<tr>
			  <th scope="col">Image</th>
			  <th scope="col">Property Location</th>
			  <th scope="col">Property Type</th>
			  <th scope="col">Level</th>
			  <th scope="col">Rent Amount</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
			$conn = new mysqli($servername, $username, $password,$dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql="SELECT * FROM `proplist`, `reqlist` where proplist.prop_id = reqlist.prop_id and reqlist.email='".$_SESSION['login_user']."';";          
			$counter = 0;
			//echo $sql;
			if($query = mysqli_query($conn, $sql))
			{
				while($row = mysqli_fetch_array($query)) 
				{ 	
					$location = $row["location"];
					$id = $row["req_id"];
					$type = $row["type"];
					$level = $row["level"];
					$price = $row["price"];
					$file_name =$row["file_name"];
		  ?>
			<tr>
				<form action="del_req.php" method="post" enctype="multipart/form-data">
				  <input type="hidden" name="id" value="<?php echo($id);?>">
				  <td data-label="image"><img src="<?php echo($file_name);?>" height="42" width="42"> </td>
				  <td data-label="name"><?php echo($location);?></td>
				  <td data-label="type"><?php echo($type);?></td>
				  <td data-label="level"><?php echo($level);?></td>
				  <td data-label="price"><?php echo($price);?></td>
				  <td data-label="update"><input type="submit" name="Del" value="Delete Request"></td>  
				</form>
			</tr>
			<?php }}?>
		  </tbody>
		</table>

		<caption><h3>My Rented Properties</h3></caption>
		<hr></hr>
		<table>
		  <thead>
			<tr>
			  <th scope="col">Registration ID</th>
			  <th scope="col">Property ID</th>
			  <th scope="col">Owner's ID</th>
			  <th scope="col">Generate OTP</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
			$conn = new mysqli($servername, $username, $password,$dbname);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql="SELECT * FROM `rent_agreement` where rent_agreement.rent_tenant='".$_SESSION['login_user']."';";          
			$counter = 0;
			//echo $sql;
			if($query = mysqli_query($conn, $sql))
			{
				while($row = mysqli_fetch_array($query)) 
				{ 	
					$id = $row["rent_id"];
					$prop_id = $row["prop_id"];
					$owner =$row["rent_owner"];
		  ?>
			<tr>
				<form action="otp.php" method="post" enctype="multipart/form-data">
				  <input type="hidden" name="id" value="<?php echo($id);?>">				  
				  <td data-label="reg_id"><?php echo($id);?></td>
				  <td data-label="prop_id"><?php echo($prop_id);?></td>
				  <td data-label="owner"><?php echo($owner);?></td>
				  <td data-label="update"><input type="submit" name="access" value="Access Property"></td>  
				</form>
			</tr>
			<?php }}?>
		  </tbody>
		</table>
	  </div>
	  <!--right blank space-->
	  <div class="right">
		&nbsp;
	  </div>
	  <!--footer section for the copyright-->
	  <div class="copyright"><a href="copyright.html">© copyright Block Security</a></div>
	  </div>
	

</body>
</html>
