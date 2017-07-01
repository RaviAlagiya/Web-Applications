<!--
	
Name : Alagiya, Ravi
Assignment : Project 5
Due Date : Dec 5,2016


URL to run the project :
http://localhost/project5/



DB Credentials
$servername = "localhost";
$username = "root";
$password = "";




-->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkout extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			 if ( ! $this->session->userdata('userName'))
		        { 
		            redirect('login');
		        }


		}

		public function index()
		{	

			$data['cartItems']= $this->contains_model->get_cartItems();
			if (isset($_GET['buyItem'])) {
				$_SESSION['cartItemsCount']= 0;
				$this->checkoutBasket();

				$data['message']='Order has been successfully placed ';

					$this->load->view('templates/header', $data);
					 $this->load->view('templates/successMsg',$data);
			     	//$this->load->view('Pages/checkout', $data);
					
					 $this->load->view('templates/footer', $data);
				}
				else
				{
					
					$this->load->view('templates/header', $data);
			     	$this->load->view('Pages/checkout', $data);
			        $this->load->view('templates/footer', $data);
				}

				

			        
		}

		public function checkoutBasket()
		{
			
			$items=$this->contains_model->get_checkout_items();

			//print_r($items);

				foreach ($items as $item) {

					//print_r($item);
						$this->shoppingOrder_model->insert_ShoppingOrder($item->ISBN,$item->warehouseCode,$_SESSION['userName'],$item->number);

						$this->stocks_model->update_Stock($item->number,$item->ISBN,$item->warehouseCode);

				}
				$this->basket_model->clear_basket();

			
		}
	}

?>