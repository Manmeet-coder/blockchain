<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION['status']))
	{
		if($_SESSION['usertype']==='owner')
			header("Location:owner.php");
		elseif($_SESSION['usertype']==='tenant')
			header("Location:tenant.php");
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
	  <li class="login"><a href="Login.php">Login / Signup</a></li>
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
		<h1>Welcome To Block Security</h1>
		<p>
			<h3>
				Plsea use our platform for hassle free lisensing of the property. 
				Property owner can list their property in our website here. Tanent can select the proprty based on the requirement. Both the perties will make the agriment online and tanent will get soft key of the property. All the agriment will remain secure in our Blockchain based ledger.
				<br/><br/>
				<img src="./resources/theme.jpg" alt="Blockchain" class="responsive">
				
			</h3>
		</p>
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
