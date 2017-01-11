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
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Single Artist Page</title>
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

                <input type="text" class="form-control" placeholder="Search Paintings" name="title">
                </div>
                  <button type="submit" class="btn btn btn-info">Search</button>

            </form>
            </div>
          </div>
        </nav>
<?php 




$id= $_GET["id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebData";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     header('Location: Error.php?error='.$conn->connect_error);
} 
$conn->set_charset("utf8");

// Artist Information
$sql = "SELECT * FROM Artists WHERE ArtistID=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    // output data 
    $row = $result->fetch_assoc();
    $ArtistImageLink="images/artists/medium/" . $row["ArtistID"].".jpg";
    $ArtistDiscription=$row["Details"];
    $ArtistLink=$row["ArtistLink"];
    $YearOfBirth=$row["YearOfBirth"];
    $YearOfDeath=$row["YearOfDeath"];
    $LastName=$row["LastName"];
    $FirstName=$row["FirstName"];
    $Nationality=$row["Nationality"];


} else {
    #echo "0 results";

    header('Location: Error.php?error='."Invalid Artist ID");    

}

?>


<div class="container">
	<div class="row">
	  <div class="col-sm-9">
	    <h1><?php echo $LastName . " " .$FirstName ?></h1>
	    <div class="row">
	      <div class="col-xs-8 col-sm-5">
	        <img src="<?php echo $ArtistImageLink;  ?>" class="img-thumbnail">
	      </div>
	      <div class="col-xs-4 col-sm-7">
	        <p><?php echo  $ArtistDiscription?></p>
	        <p><button type="button" class="btn btn-lg btn-default mybtn"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Add to Favorites List</button></p>

	        
						<div class="panel panel-default"> 
							<div class="panel-heading">Artist Details</div> 
								<table class="table"> 
								
									  <tbody> <tr><td style="width:120px;"><strong>Date :</strong></td> <td><?php echo $YearOfBirth . "-".$YearOfDeath;?></td> </tr>
											 <tr>  <td><strong>Nationality :</strong></td> <td><?php echo $Nationality ;?></td>  </tr> 
											 <tr>  <td><strong>More Info :</strong></td> <td><a href="<?php echo $ArtistLink;?>"><?php echo $ArtistLink;?></a></td>  </tr>
									</tbody>

									<p>
							     
								</table>
							 </div>
						</div>
	      </div>
	    </div>
	  </div>

	<div class="row">
			<div class="col-sm-9">
		   		 <h3>Art by <?php echo $LastName . " " .$FirstName ?></h3>
		   	</div>
	</div>
	<div class="row">

	<?php

// ArtWork Information
$sql = "SELECT * FROM Artworks WHERE ArtistID=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {

    	echo '<div class="col-xs-6 col-sm-3  myblock "> <div class="thumbnail">';
    

      $workLink='Part03_SingleWork.php?id='.$row["ArtWorkID"];

    	echo '<p><a href="Part03_SingleWork.php?id=' . $row["ArtWorkID"]. '" >' .'<img src="images/works/square-medium/' . $row["ImageFileName"]. '.jpg" class="img-thumbnail center-block"></p> <p class ="text-center myPara">';

    	echo  $row["Title"] . ' (' .
    	 	$row["YearOfWork"] .' )'.' </a></p>';

       echo '<p class="text-center"> <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-info-sign"></span><a style="color:white" href="'. $workLink.'"> View</a></button>
        <button type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Wish</button>
        <button type="button" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart</button></p>';
			      
    	echo '</div></div>';
    
    }
        
} else {
    echo "0 results";
}

$conn->close();

?>

	

</div>




	


</body>
</html>