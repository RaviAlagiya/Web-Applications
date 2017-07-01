<!--
	
Name : Alagiya, Ravi
Assignment : Project 4
Due Date : Nov 27,2016

URL to run the project :
http://localhost/project5/



DB Credentials
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
		<script src="<?php echo $this->config->base_url();?>assets/js/jquery-3.1.1.min.js"></script>

		<script src="<?php echo $this->config->base_url();?>assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url();?>assets/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url();?>assets/css/mystyle.css">

		
		
</head>
<body>


<nav class="navbar navbar-inverse">
	        <div class="container">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">CheapBook</a>
	          </div>
	          <div class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
           		 	<li ><a href="<?php echo $this->config->base_url();?>shopping">Home</a></li>
	              	<li><a href="<?php echo $this->config->base_url();?>pages/index/about">About us</a></li>
	            </ul>
			        


	            <form class="navbar-form navbar-right" action="<?php echo $this->config->base_url();?>logout" method="get">

			        <div class="form-group" style="color:white">
				       

				        		
				        		Welcome <?php echo  $_SESSION['userName'] ?>	
				       
				       <button type="submit" class=" btn btn-danger"><span class="glyphicon glyphicon-log-out">
			            		   	</span>Log out</button>

			        </div>
            		  

      			</form>
	          </div><!--/.nav-collapse -->
	        </div>
        </nav>

