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
class Book_model extends CI_Model
{
	
	public function __construct()
	{


		$this->load->database();

	
	}


	public function get_books($name= FALSE)
	{


			if ($name === FALSE) {
			$query=	$this->db->get('book');
			return $query->result_array();

				
			}
	
	$query=	$this->db->get_where('book',array('title' => $name ));
	return $query->row_array();


	}

	public function search_books_by_title($searchTerm)
	{

		

		$query = "select * from Book inner join (select ISBN, SUM(number) as bookStockCount from Stocks group by ISBN)  as BookStock on Book.ISBN=BookStock.ISBN where title LIKE '%".$searchTerm ."%' and bookStockCount >0"; 


		$result =   $this->db->query($query);           
		return $result->result();

	}

	public function search_books_by_author($searchTerm)
	{


		$query = "SELECT * FROM Book inner join WrittenBy on Book.ISBN=WrittenBy.ISBN 
						inner join Author on WrittenBy.ssn=Author.ssn
						inner join (select ISBN, SUM(number) as bookStockCount from Stocks group by ISBN)  as BookStock on Book.ISBN=BookStock.ISBN
						 WHERE Author.name LIKE '%" . $searchTerm."%' and bookStockCount >0"; 


		$result =   $this->db->query($query);           
		return $result->result();

		

	}
}
	
?>