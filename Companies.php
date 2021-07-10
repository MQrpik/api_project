<?php
require_once("controller/dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Company {
	private $companies = [];
	
	public function getAllEntry(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'SELECT * FROM entries WHERE id = '.$id;
		}else if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$query = 'SELECT * FROM entries WHERE url LIKE "%' .$url. '%"';
		}else if (isset($_GET['category_id'])) {
			$catId = $_GET['category_id'];
			$query = 'SELECT * FROM entries WHERE category_id = '.$catId;
		} else {
			$query = 'SELECT * FROM entries';
		}
		$dbcontroller = new DBController();
		$this->companies = $dbcontroller->executeSelectQuery($query);
		return $this->companies;
	}

	public function addEntry(){
		if(isset($_POST['company_name'])){
			$name = $_POST['company_name'];
			$category_id = $_POST['category_id'];
			$url = $_POST['url'];
			$address = $_POST['address'];
			$description = $_POST['description'];
			$query = "insert into entries (company_name,category_id,url,address,description) values ('" . $name ."','". $category_id ."','" . $url ."','". $address ."','". $description ."')";
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function deleteEntry(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM entries WHERE id = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function editEntry(){
		if(isset($_POST['company_name']) && isset($_GET['id'])){
			$name = $_POST['company_name'];
			$category_id = $_POST['category_id'];
			$url = $_POST['url'];
			$address = $_POST['address'];
			$description = $_POST['description'];
			$query = "UPDATE entries SET name = '" . $name ."','". $category_id ."','" . $url ."','". $address ."','". $description ."' WHERE id = ".$_GET['id'];
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			//$result = array('success'=>1);
			return $result;
		}
	}


	
}
?>