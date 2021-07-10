<?php

require_once("Companies.php");
		
class CompaniesHandler  {

	function getAllEntries() {	

		$companies = new Company();
		$rawData = $companies->getAllEntry();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);	
			echo " nie dziala pojedynczy list";		
		} else {
			$response = $this->encodeJson($rawData);
			echo $response;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		//$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["output"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function add() {	
		$entry = new Company();
		$rawData = $entry->addEntry();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);	
			echo " nie dziala add";	
		} else {
			$statusCode = 200;
			echo "dziala add";
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		//$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}

	function deleteEntryById() {	
		$mobile = new Company();
		$rawData = $mobile->deleteEntry();
		
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			echo "Skasowano wpis";
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		//$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function editEntryById() {	
		$mobile = new Company();
		$rawData = $mobile->editEntry();
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		//$this ->setHttpHeaders($requestContentType, $statusCode);
		$result = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	 
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>