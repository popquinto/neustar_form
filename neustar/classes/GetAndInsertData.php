<?php 
//This file is the one who gets the AjaxCall, and then uses class from insert.php to insert and get data
require 'insert.php';

$manager = new GetAndInsert;
echo $manager->Action();
class GetAndInsert{
	public function Action(){
		$result = new DatabaseManager;
		return $result->databaseAction();
	}
}