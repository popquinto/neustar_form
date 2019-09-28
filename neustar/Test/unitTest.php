<?php
//This file is just for testing porpouse
	require '../classes/insert.php';
	use PHPUnit\Framework\TestCase;
	

	final class TestNeustar extends TestCase {
		public function testDns(){
			$test = new DatabaseManager;
			$this->assertContains("Result",$test->databaseAction());
		}
	}
?>