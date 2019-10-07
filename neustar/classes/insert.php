<?php
require 'DatabaseSqlite.php';

class DatabaseManager{
	private $hostname; 
	private $ip;
	public function __construct(){//Construct asks if hostname is send throug POST, if not sets values for testing(unitTest.php)
		if (isset($_POST['hostname'])){
			$this->hostname = $_POST['hostname'];
		} else {
			$this->hostname = 'prueba.com';
		}

		if (isset($_POST['ip'])){
			$this->ip = $_POST['ip'];
		} else {
			$this->ip = '192.168.1.1';
		}
	}

	public function databaseAction(){
		try {			
			$database = new DatabaseSqlite;
			//First we ask if the same hostname is already inserted
			$database->query('SELECT * FROM dns_records WHERE hostname=:hostname');
			$database->bind(':hostname', $this->hostname);
			$rows = $database->resultset();
			if (empty($rows)){//If the hostname provided does not exist then
				$database->query('INSERT INTO dns_records (hostname, ip) VALUES(:hostname, :ip)');
				$database->bind(':hostname', $this->hostname);
				$database->bind(':ip', $this->ip);
				$database->execute();
				$database->query('SELECT * FROM dns_records');
				$rows = $database->resultset();
				return json_encode(array("Result"=>$rows, "status"=>"Approved")); //I set status=Approved to handle in js
			}
			else{ //if it exists in DB
				$database->query('SELECT * FROM dns_records');
				$rows = $database->resultset();
				return json_encode(array("Result"=>$rows, "status"=>"Denied")); //I set status=Denied to handle in js
			}
		} catch (Exception $e) {
			return '{"isSuccessful":"0", "status":"Error"}';
		}
	}

	public function searchHostname(){
		try {			
			$database = new DatabaseSqlite;
			//First we ask if the same hostname is already inserted
			$database->query('SELECT * FROM dns_records WHERE hostname=:hostname');
			$database->bind(':hostname', $this->hostname);
			$rows = $database->resultset();
			if (empty($rows)){//If the hostname provided does not exist then
				return '{"isSuccessful":"1", "status":"Hostname not found"}'; //I set status=Approved to handle in js
			}
			else{ //if it exists in DB
				return json_encode(array("Result"=>$rows, "status"=>"Hostname found")); //I set status=Denied to handle in js
			}
		} catch (Exception $e) {
			return '{"isSuccessful":"0", "status":"Error"}';
		}
	}
}

