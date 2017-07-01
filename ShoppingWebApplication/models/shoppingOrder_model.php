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

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class shoppingOrder_model extends CI_Model
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

	public function insert_ShoppingOrder($ISBN,$warehouseCode,$username,$number)
	{


	$data = array(
	   'ISBN' => $ISBN ,
	   'warehouseCode'=>$warehouseCode,
	   'username'=>$username,
	   'number'=>$number
	   
	   
	);

	$this->db->insert('ShippingOrder', $data); 
		

	}
}
	
?>