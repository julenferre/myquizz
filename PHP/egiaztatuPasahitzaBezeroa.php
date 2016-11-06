<?php	
	//nusoap.php klasea gehitzen dugu (LOCALHOST)
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'lib'.DIRECTORY_SEPARATOR . 'NuSOAP' . DIRECTORY_SEPARATOR . 'nusoap.php');
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'lib'.DIRECTORY_SEPARATOR . 'NuSOAP' . DIRECTORY_SEPARATOR . 'class.wsdlcache.php');
	
	//soapclient motadun objektua sortzen dugu
	//$soapclient = new nusoap_client( 'http://jferrero.esy.es/myquizz-master/PHP/egiaztatuPasahitza.php?wsdl', true);
	$soapclient = new nusoap_client( 'http://localhost:1234/myquizz/PHP/egiaztatuPasahitza.php?wsdl', true);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu eta itzultzen diguna inprimatzen dugu
	$erantzuna = $soapclient->call('egiaztatuP',array($_GET['pasahitza']));
	echo $erantzuna;
?>