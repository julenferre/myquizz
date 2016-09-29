<?php
	$servername = "localhost:3306";
	$username = "admin";
	$password = "root";
	$ddbb = "quiz"
	
	$conn = new mysqli($servername, $username, $password, $ddbb);
	
	//Konexioa konprobatu
	if($conn -> connect_error){
		die("Ezin izan da datubasearekin konexio bat ezartzea: " . $conn -> connect_error);
	}
	
	// Datuak bidali
	$izena = $_POST['izena'];
	$abizenak = $_POST['abizenak'];
	$eposta = $_POST['eposta'];
	$pasahitza = $_POST['pasahitza'];
	$telefonoa = $_POST['telefonoa'];
	$espezialitatea = $_POST['espezialitatea'];	
	if($_POST['espezialitatea']=='Besteak'){
		$espezialitatea = $_POST['espez_besteak'];
	}
	$interesak = $_POST['tresnak'];
	
	$kontsulta = "INSERT INTO Erabiltzaileak VALUES "
?>