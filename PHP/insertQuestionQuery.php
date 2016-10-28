<?php
	include "baliostapenak.php";

	if(isset($_GET['galdera'])){
		//DDBBra konektatu
		include "connect.php";
		
		// Datuak bidali
		$galdera = $_GET['galdera'];
		$erantzuna = $_GET['erantzuna'];
		$gaia = $_GET['gaia'];
		$zailtasuna = $_GET['zailtasuna'];
		if(galderaCheck($galdera) && erantzunaCheck($erantzuna)){
			$eposta = $_SESSION['login_user'];
			$query = "INSERT INTO galderak VALUES ('','$eposta','$galdera', '$erantzuna','$gaia', '$zailtasuna')";	
			if($conn->query($query) === TRUE) {
				//XML fitxategia ireki
				$xml = simplexml_load_file("../XML/galderak.xml");
				//Informazioa duten semeak sortu
				$child = $xml->addChild('assessmentItem');
				$child->addAttribute('complexity',$zailtasuna);
				$child->addAttribute('subject',$gaia);
				$galderaXML = $child->addChild('itemBody');
				$galderaXML->addChild('p',$galdera);
				$erantzunaXML = $child->addChild('correctResponse');
				$erantzunaXML->addChild('value', $erantzuna);
				
				//Fitxategia gorde
				if($xml->asXML("../XML/galderak.xml") === FALSE) {
					echo "<font color='red'>Galderaren datuak ez dira XML-an gorde: </font>". $xml . "</h2><br>";
				}

				echo "<font color='green'>Datuak ondo sartu dira</font><br><a href='../XML/galderak.xml' target='_blank'>galderak.xml ikusi</a>";
				//ekintzak taulan datuak sartzen dira
				$kon_id = $_SESSION['konexio_id'];
				$mota = "Galdera sartu";
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
		}
		
		$conn->close();
	}
?>