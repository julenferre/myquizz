<?php

	include "sesioaKonprobatu.php";
	blokeatuSarreta();

	$ServerIP = $_SERVER['SERVER_ADDR'];
	$requestURI = "http://freegeoip.net/json/" . $ServerIP; //ZERBITZARIKO IP-a. HOSTINGERREN BAKARRIK LORTUKO DU
	//$requestURI = "http://freegeoip.net/json/158.227.0.238"; //PROBARAKO IP BAT
	$json = file_get_contents($requestURI);
	$array = json_decode($json, true);

	echo $array['country_name'];
	//echo $array['country_name'] . ". " . $array["region_name"] . ", " . $array["city"]; 					//Herrialdea eta herria
	//echo "latitudea: " . round($array["latitude"],3) . ", longitudea: " . round($array["longitude"],3);	//Koordenatuak
?>