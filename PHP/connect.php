<?php

	//LOCALHOST
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$ddbb = "quiz";
	
	//HOSTINGER
	$serverH = "mysql.hostinger.es";
	$userH = "u823979798_admin";
	$passH = "adminroot";
	$ddbbH = "u823979798_quiz";
	
	$conn = new mysqli($serverH, $userH, $passH, $ddbbH); //HOSTINGER
	
	//Konexioa konprobatu
	if ($conn->connect_error) {
		$conn = new mysqli($servername, $username, $password, $ddbb); //LOCALHOST
		if (!$conn) {
			die("Ezin izan da konexioa ezarri: " . $conn->connect_error);
		}
	}
	
	//Saioa hasi
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>
