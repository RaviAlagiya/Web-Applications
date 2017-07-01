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




--><?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processcart extends CI_Controller {

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

			if (isset($_GET['item'])) {
				$this->contains_model->addItemtoBasket($_GET['item']);

				if (isset($_SESSION['cartItemsCount'])) {
				$_SESSION['cartItemsCount']= $_SESSION['cartItemsCount'] + 1;
					# code...
				}
				else
				{
				$_SESSION['cartItemsCount']=  1;

				}
					echo 'Cart <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
			 ' .$_SESSION['cartItemsCount'];




			}
			


		}


}		





		?>