<?php
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$ddbb = "quiz";
	
	$conn = new mysqli($servername, $username, $password, $ddbb);
	
	//Konexioa konprobatu
	if (!$conn) {
		die("Ezin izan da konexioa ezarri: " . mysqli_connect_error());
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
	
	$query = "INSERT INTO Erabiltzaile VALUES ('$izena', '$abizenak', '$eposta', '$pasahitza', $telefonoa, '$espezialitatea', '$interesak', '');";
				
	//echo("Query-a: $query <br>");
	
	if(mysqli_query($conn, $query)) {
		echo "<h2>Datuak ondo sartu dira</h2> <br><a href='showUsers.php'> Datuak ikusi </a>";
	}
	else{
		echo "<h2>Datuak ez dira sartu: " . $query . "</h2><br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>
