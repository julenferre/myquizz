<?php
	//nusoap.php klasea gehitzen dugu (LOCALHOST)
	//require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'NuSOAP'.DIRECTORY_SEPARATOR.'nusoap.php');
	//require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'NuSOAP'.DIRECTORY_SEPARATOR.'class.wsdlcache.php');
	
	//nusoap.php klasea gehitzen dugu (HOSTINGER)
	require_once('http://jferrero.esy.es/lib/nuSOAP/nusoap.php');
	require_once('http://jferrero.esy.es/lib/nuSOAP/class.wsdlcache.php');
	
	//soapclient motadun objektua sortzen dugu
	$soapclient = new nusoap_client( 'http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);
	
	//Web-Service-n inplementatu dugun funtzioari dei egiten diogu eta itzultzen diguna inprimatzen dugu
	$erantzuna = $soapclient->call('egiaztatuE',array($_GET['eposta']));
	echo $erantzuna;

?>