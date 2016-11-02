<?php
	//DDBBra konektatu
	include "connect.php";
	
	$eposta = NULL;
	$kon_id = NULL;
	$nireGaldKop = 0;
	$DDBBGaldKop = 0;
	
	if(session_id() != ''){
		$eposta = $_SESSION['login_user'];
		$kon_id = $_SESSION['konexio_id'];
	}
	
	// Nire galdera kopurua kalkulatu
	$query = "SELECT * FROM galderak WHERE eposta = '" . $eposta."'";					
	$erantzuna = $conn->query($query);				
	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()) {
			$nireGaldKop++;
		}
	}
	
	// Galdera guztien kopurua kalkulatu
	$query = "SELECT * FROM galderak";					
	$erantzuna = $conn->query($query);				
	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()) {
			$DDBBGaldKop++;
		}
	}
	
	echo "Nire galderak / DBko galdera guztiak: ".$nireGaldKop." / ".$DDBBGaldKop;
	
	$conn->close();	
?>