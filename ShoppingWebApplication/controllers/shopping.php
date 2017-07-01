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


class Shopping extends CI_Controller {

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

			if(isset($_GET['searchByAuthor']))
			{
				$data['books']=$this->searchBooksByAuthor($_GET['search']);
				//$this->session
				//print_r($data);
					$this->session->set_userdata('searchResult', $data);


					$this->load->view('templates/header');
			     	$this->load->view('Pages/shopping', $data);
			        $this->load->view('templates/footer');
		

			}
			else if(isset($_GET['searchByTitle']))
			{


					$data['books']=$this->searchBooksByTitle($_GET['search']);
					$this->session->set_userdata('searchResult', $data);


				//	print_r($data);
					$this->load->view('templates/header');
			     	$this->load->view('Pages/shopping', $data);
			        $this->load->view('templates/footer');

			}
			else
			{
					$this->load->view('templates/header');
					if(isset($_SESSION['searchResult']))
					$this->load->view('Pages/shopping',$_SESSION['searchResult']);
					else
					$this->load->view('Pages/shopping');

			        $this->load->view('templates/footer');

			}


			 		
		}

		public function searchBooksByTitle($searchTerm)
		{


			$data= $this->book_model->search_books_by_title($searchTerm);

			return $data;

		}

		public function searchBooksByAuthor($searchTerm)
		{

			$data= $this->book_model->search_books_by_author($searchTerm);
			return $data;



		}






	}

?>