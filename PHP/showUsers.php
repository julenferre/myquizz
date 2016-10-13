<?php

	echo "<link rel='stylesheet' type='text/css' href='../CSS/style.css'></link>";

	//DDBBra konektatu		
	include "connect.php";
	
	// Datuak jaso
	$query = "SELECT * FROM Erabiltzaile ";
		
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<table>";
		echo "<tr><th>Izena</th><th>Abizenak</th><th>Eposta</th><th>Pasahitza</th><th>Telefonoa</th><th>Espezialitatea</th><th>Interesak</th></tr>";
		while($lerroa = $erantzuna->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $lerroa["Izena"] . "</td><td>" . $lerroa["Abizenak"]. "</td><td>" . $lerroa["Eposta"]. "</td><td>" . $lerroa["Pasahitza"]. "</td><td>" . $lerroa["Telefonoa"]. "</td><td>" . $lerroa["Espezialitatea"]. "</td><td>" . $lerroa["Interesak"]. "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
	
	$conn->close();
?>
