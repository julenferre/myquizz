<?php
	//nusoap.php klasea gehitzen dugu (LOCALHOST)
	//require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'NuSOAP'.DIRECTORY_SEPARATOR.'nusoap.php');
	//require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'NuSOAP'.DIRECTORY_SEPARATOR.'class.wsdlcache.php');
	
	//nusoap.php klasea gehitzen dugu (HOSTINGER)
	require_once('http://jferrero.esy.es/lib/nuSOAP/nusoap.php');
	require_once('http://jferrero.esy.es/lib/nuSOAP/class.wsdlcache.php');
	
	
	//soap_server motako objektua sortzen dugu
	//$ns="http://localhost:1234/myquizz/PHP/egiaztatuPasahitza.php/egiaztatuP"; //name of the service (localhost)
	$ns="http://jferrero.esy.es/myquizz-master/PHP/egiaztatuPasahitza.php/egiaztatuP"; //name of the service (hostinger)
	$server = new soap_server;
	$server->configureWSDL('egiaztatuP',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	$server->register('egiaztatuP',			//funtzioaren izena
		array('pasahitza'=>'xsd:string'),	//sarrerako parametroak
		array('erantzuna'=>'xsd:string'),	//irteerako parametroak
		$ns,								//namespace-a
		$ns,								//soapaction-a
		'rpc',								//style-a
		'encoded'							//erabilera
		);
	
	//funtzioa inplementatzen dugu
	function egiaztatuP($pasahitza){
		//Fitxategia irakurtzen da eta edukia aldagai batean gordetzen da
		$fitx = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Passwords' . DIRECTORY_SEPARATOR . 'toppasswords.txt', "r");
		while (!feof($fitx)) {
			$lerroa = fgets($fitx);
			$lerroa = str_replace("\n", "", $lerroa);
			$lerroa = str_replace("\r", "", $lerroa);
			if($lerroa === $pasahitza){
				return "BALIOGABEA";
			}
		}
		fclose($fitx);		
		return "BALIOZKOA";
	}
	//nusoap klaseko sevice metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>
