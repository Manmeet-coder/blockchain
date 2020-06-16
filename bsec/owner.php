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
			<caption><h3>Property Enlistment</h3></caption>
			<hr></hr>
			<table>
					  
					  <thead>
						<tr>
						  <th scope="col">Location</th>
						  <th scope="col">Proprty Type</th>
						  <th scope="col">Level</th>
						  <th scope="col">Rent Price</th>
						  <th scope="col">Add Image</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody>
					    <form action="add_pro.php" method="post" enctype="multipart/form-data">
							<tr>
							  <td data-label="name"><input type="text" name="location" style="border:1px solid #000000"></td>
							  <td data-label="name"><input type="text" name="Office" value="Office" readonly></td>
							  <td>
								<select name="type">
							        <option value="1">1</option>
								    <option value="2">2</option>
								    <option value="3">3</option>
								    <option value="4">4</option>
								    <option value="5">5</option>
								    <option value="6">6</option>
								    <option value="7">7</option>
								    <option value="8">8</option>
								    <option value="9">9</option>
								    <option value="10">10</option>
									</select>
							  </td>
							  <td data-label="price"><input type="text" name="price" style="border:1px solid #000000"></td>
							  <td data-label="file"><input type="file" name="image"/></td>
							  <td data-label="upload"><input type="submit" name="add" value="Upload"></td>  
							</tr>
						</form>
					  </tbody>
					</table>
					<caption><h3>My Enlistments</h3></caption>
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
						$sql='SELECT * FROM `proplist` where email="'.$_SESSION['login_user'].'";';          
						$counter = 0;
						if($query = mysqli_query($conn, $sql))
						{
							while($row = mysqli_fetch_array($query)) 
							{ 	
								$id=$row["prop_id"];
								$location = $row["location"];
								$type = $row["type"];
								$level = $row["level"];
								$price = $row["price"];
								$file_name =$row["file_name"];
					  ?>
						<tr>
							<form action="update_pro.php" method="post" enctype="multipart/form-data">
							  <input type="hidden" name="id" value="<?php echo($id);?>">
							  <td data-label="image"><img src="<?php echo($file_name);?>" height="42" width="42"> </td>
							  <td data-label="name"><?php echo($location);?></td>
							  <td data-label="type"><?php echo($type);?></td>
							  <td data-label="level"><?php echo($level);?></td>
							  <td data-label="price"><input type="text" name="price" style="border:1px solid #000000" value="<?php echo($price);?>"></td>
							  <td data-label="update"><input type="submit" name="Update" value="Update"></td>  
							</form>
						</tr>
						<?php }}?>
					  </tbody>
					</table>
					
					<caption><h3>Rent Request for My Properties</h3></caption>
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
						$sql="SELECT * FROM `proplist`, `reqlist` where proplist.prop_id = reqlist.prop_id and proplist.email='".$_SESSION['login_user']."';";          
						$counter = 0;
						//echo $sql;
						if($query = mysqli_query($conn, $sql))
						{
							while($row = mysqli_fetch_array($query)) 
							{ 	
								$location = $row["location"];
								$id = $row["req_id"];
								$prop_id = $row["prop_id"];
								$type = $row["type"];
								$Level = $row["level"];
								$price = $row["price"];
								$file_name =$row["file_name"];
								$tenant=$row["email"];
					  ?>
						<tr>
							<form action="owner_action.php" method="post" enctype="multipart/form-data">
							  <input type="hidden" name="id" value="<?php echo($id);?>">
							  <input type="hidden" name="prop_id" value="<?php echo($prop_id);?>">
							  <input type="hidden" name="tenant" value="<?php echo($tenant);?>">
							  <td data-label="image"><img src="<?php echo($file_name);?>" height="42" width="42"> </td>
							  <td data-label="name"><?php echo($location);?></td>
							  <td data-label="type"><?php echo($type);?></td>
							  <td data-label="level"><?php echo($level);?></td>
							  <td data-label="price"><?php echo($price);?></td>
							  <td data-label="update"><input type="submit" name="Accept" value="Accept Request"><input type="submit" name="Del" value="Delete Request"></td>  
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
