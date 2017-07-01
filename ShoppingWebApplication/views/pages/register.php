<!--
	
Name : Alagiya, Ravi
Assignment : Project 5
Due Date : Dec 5,2016

$servername = "localhost";
$username = "root";
$password = "";


-->

<!DOCTYPE html>
<html>
<head>
	<title>
		Welcome to CheapBook
	</title>
		<script src="assets/js/jquery-3.1.1.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">

		<!--<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		-->
		
</head>
<body>




<header>
        <h1 class="header"> cheapbooks</h1>
   

</header>
<div class="container">
<div class="row">
<form class="form-horizontal">
	<fieldset>

		<!-- Form Name -->
		<legend>New User</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="name">Name</label>  
		  <div class="col-md-4">
		  <input id="name" name="name" type="text" placeholder="Enter your name" class="form-control input-md" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="email">Email</label>  
		  <div class="col-md-4">
		  <input id="userName" name="email" type="email" placeholder="Enter your email id" class="form-control input-md" required="">
		    
		  </div>
		</div>

		<!-- Password input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="password">Password</label>
		  <div class="col-md-4">
		    <input id="password" name="password" type="password" placeholder="Enter a password" class="form-control input-md" required="">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="contact">Contact no.</label>  
		  <div class="col-md-4">
		  <input id="contact" name="contact" type="text" placeholder="Enter your contact no." class="form-control input-md" required="">
		    
		  </div>
		</div>


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="street">Address</label>  
	  <div class="col-md-4">
	  <input id="street" name="street" type="text" placeholder="Enter your street" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="signup"></label>
	  <div class="col-md-4">
	    <button id="signup" name="signup" class="btn btn-success">Sign Up</button>
	  </div>
	</div>

	</fieldset>



	<?php



	// header('Refresh: 3;url=login.php');





?>
</form>
</div>
</div>
</div>


</body>
</html>