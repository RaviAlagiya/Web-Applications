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

	<title>Single Work Page</title>
	<script src="js/jquery-3.1.1.min.js"></script>

	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	
	<script src="js/bootstrap.min.js"></script>
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
<?php 

$ArtWorkID= $_GET["id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebData";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

	$temp=$conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
     header('Location: Error.php?error='.$temp);

} 

$conn->set_charset("utf8");

// Art Work Information
$sql = "SELECT * FROM  Artworks WHERE ArtWorkID=".$ArtWorkID;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
$row = $result->fetch_assoc();
$ArtistID=$row["ArtistID"];
$Title=$row["Title"];
$Description=$row["Description"];
$Cost=$row["MSRP"];
$OriginalHome=$row["OriginalHome"];
$Medium=$row["Medium"];
$YearOfWork=$row["YearOfWork"];
$Dimensions=$row["Height"] . ' x ' . $row["Width"] ;
$ArtWorkImageLink="images/works/medium/".$row["ImageFileName"].".jpg";
$ArtWorkImageLinkLarge="images/works/medium/".$row["ImageFileName"].".jpg";


/*
$sql =""
 `artworksubjects` (`ArtWorkSubjectID`, `ArtWorkID`, `SubjectID`) 
`subjects` (`SubjectId`, `SubjectName`)

#$ArtistImageLink="images/artists/medium/" . $row["ArtistID"].".jpg";


ech

`ArtWorkType`,
`GalleryID`,
`Cost`,
`MSRP`,
`ArtWorkLink`,
`GoogleLink`-->*/


} else {
	#TODO
	header('Location: Error.php?error='."Invalid Art Work"); 
   # echo "0 results";
}


$sql = "SELECT * FROM Artists WHERE ArtistID=".$ArtistID;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    // output data 
    $row = $result->fetch_assoc();
    $ArtistLink='Part02_SingleArtist.php?id='.$row["ArtistID"];
    $LastName=$row["LastName"];
    $FirstName=$row["FirstName"];
   


} else {
    echo "0 results";
}




?>


<div class="container">

	<div class="row">
		<h1 class="col-sm-9"><?php echo $Title ?></h1>
		<p class="col-sm-9"> by <a href="<?php echo $ArtistLink ?>"><?php echo $LastName . " " .$FirstName ?></a></p>
	 

	</div>
	<div class="row">
	
	 <div class="col-sm-9">

		    
		    

		    <div class="row">
		      <div class="col-xs-8 col-sm-5">
		        <img src="<?php echo $ArtWorkImageLink;  ?>" class="img-thumbnail" data-toggle="modal" data-target="#myModal">

						

						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title"><?php echo $Title .' by '.$LastName . " " .$FirstName ?></h4>
						      </div>
						      <div class="modal-body">
						      <img src="<?php echo $ArtWorkImageLinkLarge;  ?>" class="img-responsive center-block">
						      
						       
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>

						  </div>
						</div>



		      </div>
		      <div class="col-xs-4 col-sm-7">
		        
		        <p ><?php echo  $Description ?></p>
		        <h4 class="text-danger"><strong>$<?php echo  $Cost ?></strong></h4>
		        <p><button type="button" class="btn btn-lg btn-default myColor"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Add to Wish List</button>
		        <button type="button" class="btn btn-lg btn-default myColor"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Shopping Cart</button></p>

							<div class="panel panel-default"> 
								<div class="panel-heading">Product Details</div> 
									<table class="table"> 
										
										  <tbody> <tr><td><strong>Year of Work :</strong></td> <td><?php echo $YearOfWork;?></td> </tr>
												 <tr>  <td><strong>Medium :</strong></td> <td><?php echo $Medium ;?></td>  </tr> 
												 <tr>  <td><strong>Dimensions :</strong></td> <td><?php echo $Dimensions ;?></td>  </tr>
												  <tr>  <td><strong>Home :</strong></td> <td><?php echo $OriginalHome;?></td>  </tr> 
												   <tr>  <td><strong>Genres :</strong></td> <td>
												   	<?php
												    	$sql = "SELECT * FROM artworkgenres LEFT JOIN genres ON artworkgenres.GenreID=genres.GenreID
															 WHERE artworkgenres.ArtWorkID=".$ArtWorkID;

																$result = $conn->query($sql);
																if ($result->num_rows > 0) {

																    // output data of each row
																    while($row = $result->fetch_assoc()) {

																    	echo '<a href="#">'.$row["GenreName"]."</a><br>";
																    
																    }
																        
																    
																} else {
																    echo "";
																}
													?>



												   </td>  </tr> 
												    <tr>  <td><strong>Subjects :</strong></td> <td>
												    <?php
												    	$sql = "SELECT * FROM artworksubjects LEFT JOIN subjects ON artworksubjects.SubjectID=subjects.SubjectId
															 WHERE artworksubjects.ArtWorkID=".$ArtWorkID;

																$result = $conn->query($sql);
																if ($result->num_rows > 0) {

																    // output data of each row
																    while($row = $result->fetch_assoc()) {

																    	echo '<a href="#">'.$row["SubjectName"]."</a><br>";
																    
																    }
																        
																    
																} else {
																    echo "";
																}
													?>



												    </td>  </tr> 
										</tbody>

										<p>
								     
									</table>
								 </div>
							</div>
		      </div>
	



	</div>
	<div class="col-sm-3">
		<div class="panel panel-info ">
            <div class="panel-heading">
              <h3 class="panel-title">Sales</h3>
            </div>
            <div class="panel-body">
              <?php
			    	$sql = "SELECT * FROM orderdetails LEFT JOIN orders ON orderdetails.OrderID=orders.OrderID
						 WHERE orderdetails.ArtWorkID=".$ArtWorkID;

							$result = $conn->query($sql);
							if ($result->num_rows > 0) {

							    // output data of each row
							    while($row = $result->fetch_assoc()) {

							    		 $date = date("d/m/Y", strtotime($row["DateCompleted"]));;
							    		 echo "<a>".$date."</a><br>" ;
							    	#echo $row["DateCompleted"]."<br>";
							    
							    }
							        
							    
							} else {
							    echo "";
							}
				?>
            </div>
          </div>
		

	</div>
		
</div>

	
	

	<?php


$conn->close();

?>

	




	


</body>
</html>
