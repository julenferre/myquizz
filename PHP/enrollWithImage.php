<?php
	include 'baliostapenak.php';

	//DDBBra konektatu		
	include "connect.php";
	
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
	if(!empty($_FILES['argazkia']['tmp_name'])){
		$argazkia = addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));
	}
	else {
		$argazkia = addslashes(file_get_contents("../Irudiak/UserIcon.png"));
	}
	
	if(izenakCheck($izena)&& abizenakCheck($abizenak)&& emailCheck($eposta)&& pasahitzaCheck($pasahitza)&& telefonoaCheck($telefonoa)){	
		$encpass = sha1($pasahitza);
		$query = "INSERT INTO erabiltzaile VALUES ('$izena', '$abizenak', '$eposta', '$encpass', '$telefonoa', '$espezialitatea', '$interesak', '$argazkia','0');";

		if($conn->query($query) === TRUE) {
			echo "<h2>Datuak ondo sartu dira</h2> <br><a href='showUsersWithImage.php'> Datuak ikusi </a><br><a href='../HTML/layout.html'> MyQuizz-era bueltatu </a>";
		}
		else{
			echo "<h2>Datuak ez dira sartu: " . $query . "</h2><br>" . $conn->error;
		}
	}
	
	$conn->close();	
?>
