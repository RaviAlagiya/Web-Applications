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
				<div class="panel panel-info">
					    <div class="panel-heading"> <h3>Shopping Cart<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> </h3></div>
					    <div class="panel-body"><?php

					
								if (!empty($cartItems))
								{
									$total=0;
								foreach ($cartItems as $row){ ?>
							

							  	
										<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-centered">
											<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
												<img class="img-thumbnail " src="assets/img/bookImg.png">

											</div>
											<div class="col-xs-8 col-sm-10 col-md-10 col-lg-10">
													<h4 class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="display:inline"><?php echo $row->title;?></h4> 
													<h4 class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="display:inline;color:red">$<?php echo $row->price?>
														
													</h4>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
													<button type="button" class="btn btn-sm btn-danger " onclick=""><span class="glyphicon glyphicon-trash" ></span>  Remove </button>
													</div>
													
													<p class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >ISBN :<?php echo $row->ISBN;?></p>
													<p class="col-xs-12 col-sm-8 col-md-8 col-lg-8">Quantity :<strong> <?php echo $row->number;?></strong></p>
													
													

													
											</div>
										</div>

										<?php
										$total =$total + $row->price * $row->number;

				  }
							}
							else
							{

								if (isset($_SESSION['cartItemsCount']) && $_SESSION['cartItemsCount'] == 0) {
									echo  '<div class="alert alert-danger fade in alert-dismissable">
											    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
											    <strong>Error!</strong>  No Items in the cart
											</div>';
								}
								
							}

							 ?>
				 	
						</div>
				</div>

			</div>


			 	<div class="row">
				 	<div class="col-md-6 col-md-offset-6 col-sm-5 col-sm-offset-7 col-xs-10 col-xs-offset-2" style="color : red"> 

				 	<h4 class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="display:inline;color:red">Total : <?php

				 			$error="";
							if (isset($total) && $total != '') {
								echo '$'.$total;
							}
							else
							{
								echo '$0';
								$error='disabled';
							}

				 		?></h4>
										
						<form class="" action="checkout" style="display:inline">
				 			

				 			<button type="submit" name="buyItem" class="btn btn-success  col-xs-12 col-sm-3 col-md-3 col-lg-3"

				 			<?php echo $error; ?> >Buy</button>
				 		</form>
				 		
				 	</div>
			</div>
        </div>

