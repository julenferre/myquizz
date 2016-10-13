<?php
	
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
	
	$query = "INSERT INTO erabiltzaile VALUES ('$izena', '$abizenak', '$eposta', '$pasahitza', '$telefonoa', '$espezialitatea', '$interesak', '');";
				
	//echo("Query-a: $query <br>");
	
	if($conn->query($query) === TRUE) {
		echo "<h2>Datuak ondo sartu dira</h2> <br><a href='showUsersWithImage.php'> Datuak ikusi </a>";
	}
	else{
		echo "<h2>Datuak ez dira sartu: " . $query . "</h2><br>" . $conn->error;
	}
	
	$conn->close();
?>
