<?php

	echo "<link rel='stylesheet' type='text/css' href='../CSS/style.css'></link>";

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
	
	//$conn = new mysqli($servername, $username, $password, $ddbb); //LOCALHOST
	$conn = new mysqli($serverH, $userH, $passH, $ddbbH); //HOSTINGER
	
	//Konexioa konprobatu
	if (!$conn) {
		die("Ezin izan da konexioa ezarri: " . $conn->connect_error);
	}
	
	// Datuak jaso
	$query = "SELECT * FROM Erabiltzaile ";
		
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<table>";
		echo "<tr><th>Izena</th><th>Abizenak</th><th>Eposta</th><th>Pasahitza</th><th>Telefonoa</th><th>Espezialitatea</th><th>Interesak</th><th>Argazkia</th></tr>";
		while($lerroa = $erantzuna->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $lerroa["Izena"] . "</td><td>" . $lerroa["Abizenak"]. "</td><td>" . $lerroa["Eposta"]. "</td><td>" . $lerroa["Pasahitza"]. "</td><td>" . $lerroa["Telefonoa"]. "</td><td>" . $lerroa["Espezialitatea"]. "</td><td>" . $lerroa["Interesak"]. "</td><td><img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' width='100px' /></td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
	
	$conn->close();
?>
