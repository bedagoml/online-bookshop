<?php
	
	$DBhost = "localhost";
	$DBstudent1 = "root";
	$DBpass = "";
	$DBname = "incubation";
	
	try{
		
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBstudent1,$DBpass);
		$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $ex){
		
		die($ex->getMessage());
	}