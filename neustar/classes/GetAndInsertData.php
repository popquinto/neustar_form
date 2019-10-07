<?php 
//This file is the one who gets the AjaxCall, and then uses class from insert.php to insert and get data
require 'insert.php';

$manager = new GetAndInsert;

if (isset($_POST['action'])){
	if ($_POST['action']=='insert') {
		echo $manager->Action();
	} else if ($_POST['action']=='search') {
		echo $manager->Search();
	}
} 

class GetAndInsert{
	public function Action(){
		$result = new DatabaseManager;
		return $result->databaseAction();
	}

	public function Search(){
		//searchHostname
		$result = new DatabaseManager;
		return $result->searchHostname();
	}
}