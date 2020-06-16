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
<!DOCTYPE html>

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
		<h1>This Page Generate OTP for property access</h1>
		<p>
			<h3>
				<?php 
					$otp=rand(10000000,100000000)-1;
					echo($otp); 
					$file_name=$_POST['id'];
					$arg=' 2 '.$file_name.'.db '.$otp;
					$command = escapeshellcmd('C:\Users\manme\PycharmProjects\Blocksec\venv\Scripts\python C:\xampp\htdocs\bsec\blockchain.py'.$arg);
					shell_exec($command);
					
					echo("</h3><table><tr><td>Property Access Ledger</td></tr><tr><td>");
					if ($file = fopen($file_name.".res", "r")) {
						while(!feof($file)) {
							$line = fgets($file);
							# do same stuff with the $line
							echo($line.'<br/>');
						}
						fclose($file);
					}
					echo("</td></tr></table>");
				?>
			<br/><br/>
			This OTP get stored in the Block Cain ledger <br/>
			<center>
				 <button onclick="document.location = 'tenant.php'">Back to Home</button> 
			</center>
			
			
			
			
			
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
