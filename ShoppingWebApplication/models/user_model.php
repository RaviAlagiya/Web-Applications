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

class user_model extends CI_Model
{
	
	public function __construct()
	{


		$this->load->database();

		
	}


	public function get_user($username)
	{

	$query=	$this->db->get_where('customers',array('username' => $username ));
	return $query->row_array();


	}


	public function register_user($user)
	{

		$this->db->insert('Customers', $user);


	} 

}
	
?>