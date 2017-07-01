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

class Pages extends CI_Controller {

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

		public function index($page = 'login')
		{	
			//echo "in page controller" + $page;
		        		 if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
					        {
					                // Whoops, we don't have a page for that!
					                show_404();
					        }

			       /// $data['title'] = ucfirst($page); // Capitalize the first letter
					 if ($page != 'login') {
					 	 $this->load->view('templates/header');
					 }
			       
			     	$this->load->view('pages/'.$page);
			        $this->load->view('templates/footer');
		}
	}

?>