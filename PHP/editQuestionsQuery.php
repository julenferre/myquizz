<?php
	//DDBBra konektatu		
	include "connect.php";
	
	
	if(isset($_SESSION['login_user'])){
		$eposta = $_SESSION['login_user'];
		$kon_id = $_SESSION['konexio_id'];
	}
	else{
		$eposta = NULL;
		$kon_id = NULL;
	}
	
	// Datuak jaso
	$query = "SELECT * FROM galderak";
		
	$erantzuna = $conn->query($query);
	
	$mezua = "";
	
	if ($erantzuna->num_rows > 0) {
		$mezua .= "<table>";
		$mezua .= "<tr><th>Erabiltzailea</th><th>Galdera</th><th>Erantzuna</th><th>Gaia</th><th>Zailtasuna</th></tr>";
		while($lerroa = $erantzuna->fetch_assoc()) {			
			$mezua .= "<tr><form id='form".$lerroa['zenbakia']."' action='updateQuestionQuery.php'";
			$mezua .= "<td>".$lerroa['eposta']."</td>";
			$mezua .= "<td><input type='text' id='galdera' value='".$lerroa['galdera']."' required></td>";
			$mezua .= "<td><input type='text' id='erantzuna' value='".$lerroa['erantzuna']."' required></td>";
			$mezua .= "<td><input type='text' id='gaia' value='".$lerroa['gaia']."'></td>";
			$mezua .= "<td><input type='text' id='zailtasuna' value='".$lerroa['zailtasuna']."' pattern='[0-5]'></td>";
			$mezua .= "<td><input type='submit' id='submit' value='Eguneratu'></td>";
			$mezua .= "<td><input type='button' id='ezabatu' value='Ezabatu' onclick='ezabatuGaldera(".$lerroa['zenbakia'].")'></td>";
			$mezua .= "<td><input type='text' id='ekintza' value='Eguneratu' style='display:none'></td>";
			$mezua .= "<td><input type='text' id='zenbakia' value='".$lerroa['zenbakia']."' style='display:none'></td>";
			$mezua .= "</form></tr>";		
		}
		$mezua .= "<table>";
		echo $mezua;
	} else {
		echo "Ez dago galderarik";
	}
	//ekintzak taulan datuak sartzen dira			
	$mota = "Galderak ikusi";
	$ordua = date('Y/m/d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];
	$query = "INSERT INTO ekintzak VALUES ('','$kon_id','$eposta', '$mota', '$ordua', '$ip')";
	if($conn->query($query) === FALSE) {
		echo "<br/><br/><font color='red'>Ekintzaren datuak ez dira gorde: </font>". $query . "</h2><br>" . $conn->error;
	}
	
	$conn->close();
?>
