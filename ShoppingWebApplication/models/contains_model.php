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

class contains_model extends CI_Model
{
	
	public function __construct()
	{


		$this->load->database();

		
	}


	public function get_cartCount()
	{


		$query="SELECT SUM(number) as cartItemsCount FROM Contains GROUP BY basketId HAVING basketId='"
		 . $_SESSION['basketID'] . "'";

		$result =   $this->db->query($query);           
		return $result->result();		




	}

	public function get_cartItems()
	{


		$query='SELECT * FROM Contains LEFT JOIN book ON Contains.ISBN=book.ISBN WHERE basketId ="'.$_SESSION['basketID'].'"';

		$result =   $this->db->query($query);           
		return $result->result();		




	}

	public function addItemtoBasket($item)
	{
		$query='SELECT * FROM Contains WHERE ISBN ="'.$item.'" and basketId ="'.$_SESSION['basketID'].'"';

			$result =   $this->db->query($query);           
		
		$items= $result->result();		
		
			 
			  if (!empty($items)) {
			  	foreach ($items as $item_) {
			  			$temp=$item_->number + 1;
			  			$query ='UPDATE Contains SET number='.$temp .' WHERE ISBN ="'.$item.'" and basketId ="'.$_SESSION['basketID'] .'"'; 
			  			  $this->db->query($query);   
			  			}
			  
			  }
			  else
			  {
						$query = 'INSERT INTO Contains ( ISBN, basketId, number ) 
                       			VALUES
                       			("'. $item.'","'.$_SESSION['basketID'].'",1)';  
	 				
                       			 $this->db->query($query);   
			  }

	}

public function get_checkout_items()
{

		$query='SELECT ISBN, basketID, number, (SELECT warehouseCode FROM Stocks st WHERE st.ISBN= cs.ISBN limit 1) as warehouseCode  FROM Contains as cs where basketId ="'.
		$_SESSION['basketID'].'"';

		$result =   $this->db->query($query);           
		
		return $result->result();		

		
}


}
	
?>