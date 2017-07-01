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


class stocks_model extends CI_Model
{
	
	public function __construct()
	{


		$this->load->database();

		
	}

	public function update_Stock($number,$ISBN,$warehouseCode)
	{

		$query="UPDATE  Stocks SET number=number-".$number." 
		Where ISBN ='".$ISBN."' 
		and warehouseCode= '" .$warehouseCode ."'";

		$result =   $this->db->query($query); 

		
		
	}


	}

	?>