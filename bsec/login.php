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
		<form action="./login_fn.php" method="post">
		  <div class="imgcontainer">
			<img src="./resources/img_avatar2.png" alt="Avatar" class="avatar">
		  </div>

		  <div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>
				
			<button type="submit">Login</button>
			<label>
			  <input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
		  </div>
		  </form>
		  <div class="container" style="background-color:#f1f1f1">
			<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
				<div id="id01" class="modal">
				  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				  <form class="modal-content" action="./signup_fn.php">
					<div class="container">
					  <h1>Sign Up</h1>
					  <p>Please fill in this form to create an account.</p>
					  <hr>
					  <label for="email"><b>Name</b></label>
					  <input type="text" placeholder="Enter Name" name="name" required>
					  
					  <label for="email"><b>Email</b></label>
					  <input type="text" placeholder="Enter Email" name="email" required>
					  
					  <label for="phno"><b>Phone Number</b></label>
					  <input type="text" placeholder="Phone Number (will remain encrypted)" name="phno" required>
					  
					  <label for="phno"><b>Account Number</b></label>
					  <input type="text" placeholder="Account Number (will remain encrypted)" name="accno" required>

					  <label for="psw"><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="psw" required>

					  <label for="psw-repeat"><b>Repeat Password</b></label>
					  <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
					  
					  <label for="psw-repeat"><b>Account Type</b></label>
					  <select id="type" name="type">
						<option value="owner">Property Owner</option>
						<option value="tenant">Tenant </option>
					  </select>

					  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

					  <div class="clearfix">
						<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
						<button type="submit" class="signupbtn" formmethod="post">Sign Up</button>
					  </div>
					</div>
				  </form>
		  </div>
		
	  </div>
	  <!--right blank space-->
	  <div class="right">
		&nbsp;
	  </div>
	  <br/>
	  <!--footer section for the copyright-->
	  <div class="copyright"><a href="copyright.html">© copyright Block Security</a></div>
	  </div>
	
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
