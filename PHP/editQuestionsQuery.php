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
		$mezua = "";
		$mezua .= "<table>";
		$mezua .= "<tr><th>Erabiltzailea</th><th>Galdera</th><th>Erantzuna</th><th>Gaia</th><th>Maila</th></tr>";
		while($lerroa = $erantzuna->fetch_assoc()) {			
			$mezua .= "<tr><form id='form".$lerroa['zenbakia']."' name='form".$lerroa['zenbakia']."' method='post' onsubmit='return eguneratuGaldera(zenbakia.value,galdera.value,erantzuna.value,gaia.value,maila.value)'>";
			$mezua .= "<td>".$lerroa['eposta']."</td>";
			$mezua .= "<td><input type='text' id='galdera' value='".$lerroa['galdera']."' required size='30'></td>";
			$mezua .= "<td><input type='text' id='erantzuna' value='".$lerroa['erantzuna']."' required size='30'></td>";
			$mezua .= "<td><input type='text' id='gaia' value='".$lerroa['gaia']."'></td>";
			$mezua .= "<td><input type='text' id='maila' value='".$lerroa['maila']."' pattern='[0-5]' size='6'></td>";
			$mezua .= "<td><input type='submit' value='Eguneratu'></td>";
			$mezua .= "<td><input type='button' id='ezabatu' value='Ezabatu' onclick='ezabatuGaldera(zenbakia.value)'>";
			$mezua .= "<input type='text' id='zenbakia' value='".$lerroa['zenbakia']."' style='display:none'></td>";
			$mezua .= "</form></tr>";
		}
		$mezua .= "</table>";
		echo $mezua;
	} else {
		echo "Ez dago galderarik";
	}
	//ekintzak taulan datuak sartzen dira			
	$mota = "Galderak editatzeko kargatu";
	$ordua = date('Y/m/d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];
	$query = "INSERT INTO ekintzak VALUES ('','$kon_id','$eposta', '$mota', '$ordua', '$ip')";
	if($conn->query($query) === FALSE) {
		echo "<br/><br/><font color='red'>Ekintzaren datuak ez dira gorde: </font>". $query . "</h2><br>" . $conn->error;
	}
	
	$conn->close();
	
?>
