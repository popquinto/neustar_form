<?php

class DatabaseSqlite{
	//I declared these parameters because first I connected to a mysql database
	private $host 		= 'localhost';
	private $user 		= 'root';
	private $pass	 	= 'mysql';
	private $dbname 	= 'myblog';

	private $dbh;//database handler
	private $error;
	private $stmt;

	public function __construct(){
		$options = array(
			PDO::ATTR_PERSISTENT		=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION,
		);//This is optional 
		//Create new PDO
		try {
			$this->dbh= new PDO("sqlite:C:/mydb.db");//Path where my sqlite db file is
		} catch (PDOEception $e) {
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param,$value,$type=null){//Method to handler the database parameters
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type= PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function lastInsertId(){ //method to handle if the request was inserted in DB
		$this->dbh->lastInsertId();
	}

	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);//This is how the database is going to return our data
	}

}
?>