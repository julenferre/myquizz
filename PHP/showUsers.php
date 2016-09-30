<?php

	echo "<link rel='stylesheet' type='text/css' href='../CSS/style.css'></link>";

	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$ddbb = "quiz";
	
	$conn = new mysqli($servername, $username, $password, $ddbb);
	
	//Konexioa konprobatu
	if (!$conn) {
		die("Ezin izan da konexioa ezarri: " . mysqli_connect_error());
	}
	
	// Datuak jaso
	$query = "SELECT * FROM Erabiltzaile ";
		
	$erantzuna = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($erantzuna) > 0) {
		echo "<table>";
		echo "<tr><td><b>Izena</b></td><td><b>Abizenak</b></td><td><b>Eposta</b></td><td><b>Pasahitza</b></td><td><b>Telefonoa</b></td><td><b>Espezialitatea</b></td><td><b>Interesak</b></td><td><b>Argazkia<b></td></tr>";
		while($lerroa = mysqli_fetch_assoc($erantzuna)) {
			echo "<tr>";
			echo "<td>" . $lerroa["Izena"] . "</td><td>" . $lerroa["Abizenak"]. "</td><td>" . $lerroa["Eposta"]. "</td><td>" . $lerroa["Pasahitza"]. "</td><td>" . $lerroa["Telefonoa"]. "</td><td>" . $lerroa["Espezialitatea"]. "</td><td>" . $lerroa["Interesak"]. "</td><td>" . $lerroa["Argazkia"]. "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
	
	mysqli_close($conn);
?>
