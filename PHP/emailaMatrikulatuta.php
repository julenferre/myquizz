<?php
	//nusoap.php klasea gehitzen dugu
	require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'nuSOAP'.DIRECTORY_SEPARATOR.'nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'nuSOAP'.DIRECTORY_SEPARATOR.'class.wsdlcache.php');
	
	//soapclient motadun objektua sortzen dugu
	$soapclient = new nusoap_client( 'http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu eta itzultzen diguna inprimatzen dugu
	$erantzuna = $soapclient->call('egiaztatuE',array($_GET['eposta']));
	echo $erantzuna;

?>