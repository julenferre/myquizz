<?php
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
	if($_FILES['argazkia']['tmp_name'] !== ""){
		$argazkia = addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));
	}
	else {
		$argazkia = NULL;
	}
	
	//Emaila balidatzen da
	$epostaCheck="/[a-zA-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/";   

	if(!isset($eposta) || empty($eposta) || !preg_match($epostaCheck,$eposta)) {   
		echo "Emailaren formatua okerra da <br>";
	}
	else {		
		$query = "INSERT INTO Erabiltzaile VALUES ('$izena', '$abizenak', '$eposta', '$pasahitza', $telefonoa, '$espezialitatea', '$interesak', '$argazkia');";
	
		//echo("Query-a: $query <br>");
		
		if($conn->query($query) === TRUE) {
			echo "<h2>Datuak ondo sartu dira</h2> <br><a href='showUsersWithImage.php'> Datuak ikusi </a>";
		}
		else{
			echo "<h2>Datuak ez dira sartu: " . $query . "</h2><br>" . $conn->error;
		}
	}	
	
	$conn->close();	
?>
