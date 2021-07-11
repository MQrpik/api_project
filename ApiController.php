<?php
require_once("CompaniesHandler.php");
require_once("utils/debug.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["do"]))
$page_key = $_GET["do"];

	switch($page_key){

		case "list":		
			$companiesHandler = new CompaniesHandler();
			$result = $companiesHandler->getAllEntries();
			break;

		case "listCat":		
			$companiesHandler = new CompaniesHandler();
			$result = $companiesHandler->getAllCategories();
			break;
	
		case "create":		
			$companiesHandler = new CompaniesHandler();
			$companiesHandler->add();
		break;

		case "createCat":		
			$companiesHandler = new CompaniesHandler();
			$companiesHandler->addCat();
		break;
		
		case "delete":
			$companiesHandler = new CompaniesHandler();
			$result = $companiesHandler->deleteEntryById();
		break;

		case "deleteCat":
			$companiesHandler = new CompaniesHandler();
			$result = $companiesHandler->deleteCatById();
		break;
		
		case "update":
				$companiesHandler = new CompaniesHandler();
			$companiesHandler->editEntryById();
		break;
}
?>
