<?php
	include "baliostapenak.php";
	//DDBBra konektatu
	include "connect.php";
		
	// Datuak bidali
	$zenbakia = $_GET['zenbakia'];		
	if($_GET['ekintza']==='Ezabatu'){
		$query = "DELETE FROM galderak WHERE zenbakia=$zenbakia";
	}
	else if(galderaCheck($_GET['galdera']) && erantzunaCheck($_GET['erantzuna'])){
		$galdera = $_GET['galdera'];
		$erantzuna = $_GET['erantzuna'];
		$gaia = $_GET['gaia'];
		$maila = $_GET['maila'];
		$query = "UPDATE galderak SET galdera='$galdera',erantzuna='$erantzuna',gaia='$gaia',maila='$maila' WHERE zenbakia='$zenbakia'";
	}
	else {
		echo "Errorea";
	}
	if($conn->query($query) === TRUE){
		if($_GET['ekintza']==='Ezabatu'){
			echo "Galdera ondo ezabatu da";
		}
		else{
			echo "Galdera ondo eguneratu da";
		}
		//Ekintzak taulan datuak sartzen dira
		$eposta = NULL;
		$kon_id = NULL;
		if(session_id() != ''){
			$eposta = $_SESSION['login_user'];
			$kon_id = $_SESSION['konexio_id'];
		}
		$mota = "Galdera eguneratu";
		$ordua = date('Y/m/d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = "INSERT INTO ekintzak VALUES ('','$kon_id','$eposta', '$mota', '$ordua', '$ip')";
		if($conn->query($query) === FALSE) {
			echo "<font color='red'>Ekintzaren datuak ez dira gorde: </font>". $query . "</h2><br>" . $conn->error;
		}
	}
	else{
		echo "<h2><font color='red'>Datuak ez dira sartu: </font>" . $query . "</h2><br>" . $conn->error;
	}

	$conn->close();
?>