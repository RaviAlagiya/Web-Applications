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



	<div class="row" style="margin-top:20px">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="login">
				<fieldset>
					<h2>Please Sign In</h2>
					<hr class="colorgraph">
					<div class="form-group">
	                    <input name="userName" id="userName" class="form-control input-lg" placeholder="UserName">
					</div>
					<div class="form-group">
	                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
					</div>
					<span class="button-checkbox">
						
	                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
						
					</span>
					<hr class="colorgraph">
					<div class="form-group">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
	                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<a href="register" class="btn btn-lg btn-primary btn-block">Register</a>
						</div>
					</div>
					</div>
				</fieldset>
			</form>
			


		</div>
	</div>
</div>

	




</body>
</html>