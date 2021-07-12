<?php
require_once("Handler.php");
require_once("utils/debug.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["do"]))
$page_key = $_GET["do"];

	switch($page_key){

		case "list":		
			$companiesHandler = new Handler();
			$result = $companiesHandler->getAllEntries();
			break;

		case "listCat":		
			$companiesHandler = new Handler();
			$result = $companiesHandler->getAllCategories();
			break;
	
		case "create":		
			$companiesHandler = new Handler();
			$companiesHandler->add();
		break;

		case "createCat":		
			$companiesHandler = new Handler();
			$companiesHandler->addCat();
		break;
		
		case "delete":
			$companiesHandler = new Handler();
			$result = $companiesHandler->deleteEntryById();
		break;

		case "deleteCat":
			$companiesHandler = new Handler();
			$result = $companiesHandler->deleteCatById();
		break;
		
		case "update":
			$companiesHandler = new Handler();
			$companiesHandler->editEntryById();
		break;
		
		case "updateCat":
			$companiesHandler = new Handler();
			$companiesHandler->editCatById();
		break;
}
?>
