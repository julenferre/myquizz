<?php	
	//nusoap.php klasea gehitzen dugu
	require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'nuSOAP'.DIRECTORY_SEPARATOR.'nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'nuSOAP'.DIRECTORY_SEPARATOR.'class.wsdlcache.php');
	
	//soapclient motadun objektua sortzen dugu
	//$soapclient = new nusoap_client( 'http://localhost:1234/myquizz/PHP/egiaztatuPasahitza.php?wsdl', true); //localhost
	$soapclient = new nusoap_client( 'http://jferrero.esy.es/myquizz-master/PHP/egiaztatuPasahitza.php?wsdl', true); //hostinger
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu eta itzultzen diguna inprimatzen dugu
	$erantzuna = $soapclient->call('egiaztatuT',array($_GET['ticketa']));
	echo $erantzuna;
?>