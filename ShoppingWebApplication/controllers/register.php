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

class register extends CI_Controller {

		function __construct()
		{
			parent::__construct();		
			$this->load->helper('url');
		//	$this->load->library('session');
			 
		           
		       
		}


	public function index()
	{
				

			if(isset($_GET['signup']))
			{
				

					$user = array(
					   'username' => $_GET['name'] ,
					   'password'=>$_GET['password'],
					   'address'=>$_GET['street'],
					   'phone'=>$_GET['contact'],
					   'email'=>$_GET['email']
					);


					$result=$this->user_model->register_user($user);

					$data['message']="User Registered Successfully ";
					


						$this->load->view('Pages/register');
						$this->load->view('templates/successMsg',$data);
			        	$this->load->view('templates/footer');



			}
			else
			{
					$this->load->view('Pages/register');
			        $this->load->view('templates/footer');
			}
			

			//$this->load->view('templates/header');
			     	

	}

	}?>