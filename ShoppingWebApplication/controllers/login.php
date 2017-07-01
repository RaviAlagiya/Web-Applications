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

class Login extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}

		public function index()
		{	

			if (isset($_POST["userName"]) && isset($_POST["password"])) {
				
				if ($this->validateUser()) {#correct credentials

					$this->session->set_userdata('userName', $_POST["userName"]);
					#echo $_SESSION['userName'];

					# $_SESSION['userName']=$_POST["userName"];
					$this->creatUserBasket($_POST["userName"]);

					$count=$this->countUserBasket();
				
					if(isset($count[0]))
					$this->session->set_userdata('cartItemsCount',$count[0]->cartItemsCount );

					$data='';

			        $this->load->view('templates/header', $data);
			     	$this->load->view('Pages/shopping', $data);
			        $this->load->view('templates/footer', $data);

					#header("Location: shopping.php");
				} else { #  wrong credentials

					$this->session->sess_destroy();

					$data='';
					//echo '<div class="alert alert-danger" role="alert"> <strong>Wrong Credentials</strong> , Please try again !</div>';

					$data['message']='Wrong Credentials, Please try again !';
			     	$this->load->view('Pages/login', $data);

					$this->load->view('templates/error',$data);
			        $this->load->view('templates/footer', $data);


					
					
				}
				

			}
			else #first visit
			{
				$data="";
					//$this->load->view('templates/header', $data);
			     	$this->load->view('Pages/login', $data);
			        $this->load->view('templates/footer', $data);

			}


	
		}


		public function validateUser()
		{

			
					$username = $_POST["userName"];
					$password = $_POST["password"];

					if (empty($username) || empty($password)) {

						return FALSE;
					}
						

					$data['customer'] =$this->user_model->get_user($username);


					foreach ($data as $customer) {
						
						if ($customer['password'] == $password)
						{
							return TRUE;
						}

					}

				 return false;
			 
		}

		public function creatUserBasket($username)
		{

			$basket =$this->basket_model->get_basket($username);

			if(!empty($basket)) #if cart is saved
			{

				$this->session->set_userdata('basketID', $basket["basketId"]);
			#echo $basket["basketId"];
		         #	$_SESSION['basketID']=$basket["basketId"] ;
				
			#	updateCartNumber();
			}
			else #create new  cart
			{
				#$_SESSION['basketID']=uniqid();		
				$this->session->set_userdata('basketID', uniqid());

				$this->basket_model->set_basket($username,$_SESSION['basketID']);

			}


			
		}

		public function countUserBasket()
		{
			//print_r($this->contains_model->get_cartCount());
			//$data['count']=$this->contains_model->get_cartCount();
			return $this->contains_model->get_cartCount();

		}
	}

?>