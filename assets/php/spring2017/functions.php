<?php 

	require_once("global.php");

	include_once("classes/faq.php");
	include_once("classes/everything.php");
	// phpinfo();


	function test_db(){
		$db = new Db;
		$result = $db -> connect();
	}




?>