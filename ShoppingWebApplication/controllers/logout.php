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

class logout extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}

		public function index()
		{

					$this->session->sess_destroy();
			/*
		         if ( ! file_exists(APPPATH.'views/Pages/'.$page.'.php'))
					        {
					                // Whoops, we don't have a page for that!
					                show_404();
					        }
*/
			      //  $data['title'] = ucfirst($page); // Capitalize the first letter

			     //  $this->load->view('templates/header');
			     	$this->load->view('Pages/login');
			        $this->load->view('templates/footer');
		}
	}



?>
