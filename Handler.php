<?php

require_once("LinkBackend.php");
		
class Handler  {

	function getAllEntries() {	

		$companies = new Company();
		$rawData = $companies->getAllEntry();

		if(empty($rawData)) {
			echo "Błąd wyświetlania";		
		} else {
			$response = $this->encodeJson($rawData);
			echo $response;
		}
	}
	
	function add() {	
		$entry = new Company();
		$rawData = $entry->addEntry();
		if(empty($rawData)) {
			echo "Błąd dodawania wpisu";	
		} else {
			echo "Dodano wpis";
		}
	}

	function deleteEntryById() {	
		$mobile = new Company();
		$rawData = $mobile->deleteEntry();
		
		if(empty($rawData)) {
			echo "Błąd kasowania";
		} else {
			echo "Skasowano wpis";
		}
	}
	
	function editEntryById() {	
		$company = new Company();
		$rawData = $company->editEntry();
		if(empty($rawData)) {
			echo "Błąd edycji";		
		} else {
			echo "Edytowano wpis";
		}
		
	}
	 
	function getAllCategories() {	

		$category = new Category();
		$rawData = $category->getAllCat();

		if(empty($rawData)) {
			echo "Błąd wyświetlania gategorii";		
		} else {
			$response = $this->encodeJson($rawData);
			echo $response;
		}

	}

	function addCat() {	
		$category = new Category();
		$rawData = $category->addCategory();
		if(empty($rawData)) {
			echo "Błąd dodawania kategorii";	
		} else {
			echo "Dodano kategorie";
		}
	}

	function deleteCatById() {	
		$cat = new Category();
		$rawData = $cat->deleteCategory();	
		if(empty($rawData)) {
			echo "Błąd kasowania kategorii";
		} else {
			echo "Skasowano kategorię";
		}
	}

	function editCatById() {	
		$cat = new Category();
		$rawData = $cat->editCategory();
		if(empty($rawData)) {
			echo "Błąd edycji kategorii";		
		} else {
			echo "Edytowano nazwę kategorii";
		}
	}

	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
}
?>