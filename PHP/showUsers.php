<?php
	$servername = "localhost:3306";
	$username = "admin";
	$password = "root";
	$ddbb = "quiz"
	
	$conn = new mysqli($servername, $username, $password, $ddbb);
	
	//Konexioa konprobatu
	if (!$conn) {
		die("Ezin izan da konexioa ezarri: " . mysqli_connect_error());
	}
	
	// Datuak jaso
	$query = "SELECT * "
			+"FROM Erabiltzaileak ";
	
	if($erantzuna->mysqli_query($conn, $query){
		var_dump($erantzuna);
	}
	else{
		echo "Ezin izan dira datuak sartu";
	}
	
	mysqli_close($conn);
?>
