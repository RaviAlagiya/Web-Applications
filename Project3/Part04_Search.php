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
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 

	<title>Search</title>
	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
	<script src="js/myJs.js"></script>
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

			          <input type="text" class="form-control" placeholder="Search Paintings" name="title">
			        	</div>
            		  <button type="submit" class="btn btn btn-info">Search</button>

      			</form>
	          </div><!--/.nav-collapse -->
	        </div>
        </nav>

<div class="container theme-showcase">
	<div class="page-header">
       	 <h1>Search Results</h1>
    </div>


 	<form action="Part04_Search.php?" method="get" >
		<div class="form-group well well-lg">
				<div class="radio">
		  			<label><p><input type="radio" id="titleRadio" name="filterType" value="title"  onclick="showType(this.value)" >Filter by Title
		  			</p></label>
		  			<p>
		  			<input type="text" id="title" class="form-control" name="title" >
				
				
		  			</p>
		  			</div>
				
				<div class="radio">
			  		<label><p><input type="radio" id="descriptionRadio" name="filterType" value="description" onclick="showType(this.value)">Filter by Description
			  		</p></label>
			  		<p><input type="text" id="description" style="display:none" class="form-control" name="description" ></p>
				</div>

				<div class="radio ">
			 		 <label><p><input type="radio" id="allRadio"name="filterType" value="all" onclick="showType(this.value)">No Filter (Show All art Works)
			 		 </p></label>
			 		 
				</div>
				 
				    <button type="submit" class="btn btn-info">Filter</button>
		</div>
           

    </form>



    
</div>
<div class="row">
	<div class="col-md-3">
		

	</div>
	<div class="col-md-9">
		

	</div>
</div>

<div class="container" id="result">
	


<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

#$conn->set_charset ("UTF-8,ISO-8859-15");#  mysql_set_charset("")
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// ArtWork Information
$conn->set_charset("utf8");


if (isset($_GET['title']) && !empty($_GET['title'])) {
    //The parameter you need is present

		$title= $_GET["title"];

		$sql = "SELECT * FROM Artworks WHERE Title LIKE '%".$title ."%'";
		displayResult($conn);

		
}

else if (isset($_GET['description']) && !empty($_GET['description'])) {
	$Description= $_GET["description"];

		$sql = "SELECT * FROM Artworks WHERE Description LIKE '%".$Description ."%'";
		displayResult($conn);

		

}
else if (isset($_GET['filterType']) && !empty($_GET['filterType'])) {

	
	if ($_GET["filterType"] == 'all') {
	
		$sql = "SELECT * FROM Artworks";
		displayResult($conn);
		


	}

}
	



function displayResult() {

	
	global $conn, $sql; 
   
    $result = $conn->query($sql);
			if ($result->num_rows > 0) {

			    // output data of each row
			    while($row = $result->fetch_assoc()) {

			    			echo '<div class="row"><p>
									<div class="col-md-2">';
											echo '<a href="Part03_SingleWork.php?id=' . $row["ArtWorkID"]. '" >' .'<img src="images/works/square-medium/' . $row["ImageFileName"]. '.jpg" class="img-thumbnail center-block"> ';

								echo '</div>
									<div class="col-md-10"><P>';

										echo $row["Title"].'</a></p><p>';

										echo $row["Description"] ."<br />";


										echo '</p>';

								echo "</div>
								</p></div>";
			    }       
			} 
			else 
			{
				    echo "0 results";	
			}
}

$conn->close();

?>

</div>

</body>
</html>