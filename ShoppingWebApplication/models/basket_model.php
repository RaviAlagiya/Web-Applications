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
/**
* 
*/
class basket_model extends CI_Model
{
	
	public function __construct()
	{


		$this->load->database();

		
	}


	public function get_basket($username)
	{

	$query=	$this->db->get_where('ShoppingBasket',array('username' => $username ));
	return $query->row_array();


	}

	public function set_basket($username,$basket)
	{


	$data = array(
	   'username' => $username ,
	   'basketId' => $basket 
	   
	);

	$this->db->insert('ShoppingBasket', $data); 
		

	}


	public function clear_basket()
	{
		$query='DELETE FROM Contains where basketId ="'.$_SESSION['basketID'].'"';

		$result =   $this->db->query($query); 

	  				
	}
}
	
?>