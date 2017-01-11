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
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
	<title>Artist Page</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/myStyle.css">

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

                <input type="text" class="form-control" placeholder="Search  Paintings" name="title">
                </div>
                  <button type="submit" class="btn btn btn-info">Search</button>

            </form>
            </div><!--/.nav-collapse -->
          </div>
        </nav>

<div class="container theme-showcase">
	<div class="page-header">
       	 <h1>Artist List</h1>
    </div>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->set_charset("utf8");

$sql = "SELECT * FROM Artists order by LastName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	 	echo '<a href="Part02_SingleArtist.php?id=' . $row["ArtistID"]. '">'. $row["LastName"]. ', '. $row["FirstName"] . ' ('.
    	 	$row["YearOfBirth"] .'-'.$row["YearOfDeath"]. ' )'.' </a></br>';
    
    		
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</div>
</body>
</html>
