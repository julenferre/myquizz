<?php
	include "baliostapenak.php";

	if(isset($_GET['galdera'])){
		//DDBBra konektatu
		include "connect.php";
		
		// Datuak bidali
		$zenbakia = $_GET['zenbakia'];
		$galdera = $_GET['galdera'];
		$erantzuna = $_GET['erantzuna'];
		$gaia = $_GET['gaia'];
		$zailtasuna = $_GET['zailtasuna'];
		if($_GET['ekintza']==='Ezabatu'){
			$query = "DELETE FROM galderak WHERE zenbakia=$zenbakia";
		}
		else if(galderaCheck($galdera) && erantzunaCheck($erantzuna)){
			$eposta = $_SESSION['login_user'];
			$query = "INSERT INTO galderak VALUES ('','$eposta','$galdera', '$erantzuna','$gaia', '$zailtasuna')";
			$query = "UPDATE galderak SET column1=value1 ... WHERE zenbakia=$zenbakia";
		}
		if($conn->query($query) === TRUE){
			if($_GET['ekintza']==='Ezabatu'){
				echo "Galdera ondo ezabatu da";
			}
			else{
				echo "Galdera ondo eguneratu da";
			}
			//Ekintzak taulan datuak sartzen dira
			$kon_id = $_SESSION['konexio_id'];
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
	}
?>