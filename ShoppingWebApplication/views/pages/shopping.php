<!--
	
Name : Alagiya, Ravi
Assignment : Project 5
Due Date : Dec 5,2016


$servername = "localhost";
$username = "root";
$password = "";


-->




<div class="container">

	<div class="row">
	<div class="col-md-10">
		 <h2>Search Book</h2>
	</div>
	<a href="checkout">
		<div class="col-md-2">
			<h3 id="cartNumber">Cart <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
			 <?php 

			if(isset($_SESSION['cartItemsCount']))
				 echo $_SESSION['cartItemsCount'];


				?>
			</h3>
		</div>
	</a>
       	
    </div>

	<div class="row">
		<form action="shopping" method="get" >
			<div class="form-group well well-lg">
			  			<p>
			  			<input type="text" id="search" class="form-control " name="search" value="<?php if(isset($_GET['search']))echo $_GET['search'] ;?>" >
			  			</p>
					    <button type="submit" name="searchByAuthor" class="btn btn-primary">Search by Author</button>
					    <button type="submit" name="searchByTitle" class="btn btn-primary">Search by Title</button>

			</div>
         </form>
	</div>

	<div class="row">

	<?php
if (!empty($books))

	foreach ($books as $row) {
	
			  	?>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<p><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								<img class="img-thumbnail " src="assets/img/bookImg.png">

							</div>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<h4><? echo $row->title ?></h4> 
									<h5>Price: $<? echo $row->price?></h5>
									
									<h5>Available : <? echo $row->bookStockCount?> </h5>

									<button type="button" class="btn btn-sm btn-success" 
									onclick=addToCart('<?php echo $row->ISBN ?>');><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</button>
										
							</div></p>
						</div>



					<?php
				}



	 ?>
	

	</div>

</div>
        
<script>
        	
	function addToCart(item)
	{
	//Ajax call for adding items to cart


		xmlhttp=new XMLHttpRequest();

		xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {


	    		document.getElementById("cartNumber").innerHTML= this.responseText;
	     
	   	 }
	  	}
	 	xmlhttp.open("GET","processcart?item="+item,true);
		xmlhttp.send();
	

	}


</script>




</body>
</html>
