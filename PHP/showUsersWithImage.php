<?php
	
	include "sesioaKonprobatu.php";
	blokeatuSarreta();

	echo "<link rel='stylesheet' type='text/css' href='../CSS/style.css'></link>";
	
	//DDBBra konektatu		
	include "connect.php";
	
	// Datuak jaso
	$query = "SELECT * FROM erabiltzaile ";
		
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<body style='padding:3%'><center><b>ERABILTZAILEAK</b><br /<br /><br /><table>";
		echo "<tr><th>Izena</th><th>Abizenak</th><th>Eposta</th><th>Pasahitza</th><th>Telefonoa</th><th>Espezialitatea</th><th>Interesak</th><th>Argazkia</th></tr>";
		while($lerroa = $erantzuna->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $lerroa["Izena"] . "</td><td>" . $lerroa["Abizenak"]. "</td><td>" . $lerroa["Eposta"]. "</td><td>" . $lerroa["Pasahitza"]. "</td><td>" . $lerroa["Telefonoa"]. "</td><td>" . $lerroa["Espezialitatea"]. "</td><td>" . $lerroa["Interesak"]. "</td><td><img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' width='100px' /></td>";
			echo "</tr>";
		}
		echo "</table><center><br><p style='text-align: center;'><a href='../HTML/layout.html'> MyQuizz-era bueltatu </a></p></body>";
	} else {
		echo "0 results";
	}
	
	$conn->close();
?>
