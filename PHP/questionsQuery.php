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
	
	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()) {
			echo " -> <b>" .$lerroa['gaia']. ":</b> " . $lerroa['galdera'] . " (Zailtasun maila: " . $lerroa['maila'] . ")<br>";
		}
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
