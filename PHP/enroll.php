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
	
	$query = "INSERT INTO Erabiltzaileak "
			+"VALUES ("$izena+", "
					  +$abizenak+", "
					  +$eposta+", "
					  +$pasahitza+", "
					  +$telefonoa+", "
					  +$espezialitatea+", "
					  +$interesak+", "
					  +"NULL)";
		
	if(mysqli_query($conn, $query){
		echo "Datuak ondo sartu dira <br><a href='showUsers.php'> Datuak ikusi </a>";
	}
	else{
		echo "Datuak ez dira sartu: " . $query . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>
