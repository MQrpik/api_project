<?php
require_once("CompaniesHandler.php");
require_once("utils/debug.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["do"]))
$page_key = $_GET["do"];
/*
controls the RESTful services
URL mapping
*/
	switch($page_key){

		case "list":
			// to handle REST Url /mobile/list/
			$companiesHandler = new CompaniesHandler();
			$result = $companiesHandler->getAllEntries();
			break;
	
		case "create":
			// to handle REST Url /mobile/create/
			$companiesHandler = new CompaniesHandler();
			$companiesHandler->add();
		break;
		
		case "delete":
			// to handle REST Url /mobile/delete/<row_id>
			$companiesHandler = new CompaniesHandler();
			$result = $companiesHandler->deleteEntryById();
		break;
		
		case "update":
			// to handle REST Url /mobile/update/<row_id>
			$companiesHandler = new CompaniesHandler();
			$companiesHandler->editEntryById();
		break;
}
?>
