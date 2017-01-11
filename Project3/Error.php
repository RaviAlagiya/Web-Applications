<!--

Name : Alagiya, Ravi
Assignment : Project 3
Due Date : Nov 20,2016

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebData";
-->



<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<script src="js/jquery-3.1.1.min.js"></script>

	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/myStyle.css">
	<script src="js/bootstrap.min.js"></script>
	

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
	            <a class="navbar-brand" href="#">Project 3</a>
	          </div>
	          <div class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
           		 <li ><a href="default.php">Home</a></li>
	              <li><a href="About.php">About us</a></li>
	              <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="Part01_ArtistsDataList.php">Artist Data List</a></li>
	                  <li><a href="Part02_SingleArtist.php?id=19">Single Artist</a></li>
	                  <li><a href="Part03_SingleWork.php?id=394">Single Work</a></li>
	                   <li><a href="Part04_Search.php">Search</a></li>
	                  
	                </ul>
	              </li>
	             

	            </ul>
			        


	            <form class="navbar-form navbar-right" action="Part04_Search.php?title=" method="get">

			        <div class="form-group">
			        <p class="name"><a href="About.php"  >Alagiya, Ravi R</a></p>

			          <input type="text" class="form-control" placeholder="Search" name="title">
			        	</div>
            		  <button type="submit" class="btn btn btn-info">Search</button>

      			</form>
	          </div><!--/.nav-collapse -->
	        </div>
        </nav>

<div class="container">


	<h1 class="errorText" >Error !
		<?php


		echo $_GET["error"];;

		?></h1>




		<div id="ErorrDiv">


<div class="container">
     
      <div class="row">
        <div class="col-md-2">

        <P ><h3 ><span class="glyphicon glyphicon-info-sign"></span> About Us</h3></P>
        
         
          <p>What this is about and other stuff</p>
          <p><a class="btn btn-default" href="About.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </a></p>
        </div>
        <div class="col-md-2">
          <h3 ><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Artist List</h3>
          <p>Display list of artist names as links </p>
          <p><a class="btn btn-default" href="Part01_ArtistsDataList.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </a></p>
       </div>
        <div class="col-md-2">
          <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Single Artist</h3>
          <p>Information about single artist</p>
          <p><a class="btn btn-default" href="Part02_SingleArtist.php?id=19" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </a></p>
        </div>
        <div class="col-md-2">
          <h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Single Work</h3>
          <p>Displays information for single work</p>
          <p><a class="btn btn-default" href="Part03_SingleWork.php?id=394" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
        </div>
        <div class="col-md-2">
          <h3><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</h3>
          <p>Perform search on Artworks Table</p>
          <p><a class="btn btn-default" href="Part04_Search.php" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page </a></p>
        </div>
      </div>

      <hr>

      <footer>
       
      </footer>
    </div>







</div>
</div>


</body>
</html>