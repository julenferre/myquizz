<?php
	//nusoap.php klasea gehitzen dugu
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'lib'.DIRECTORY_SEPARATOR . 'NuSOAP' . DIRECTORY_SEPARATOR . 'nusoap.php');
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'lib'.DIRECTORY_SEPARATOR . 'NuSOAP' . DIRECTORY_SEPARATOR . 'class.wsdlcache.php');
	
	//soap_server motako objektua sortzen dugu
	$ns=dirname(__FILE__) . DIRECTORY_SEPARATOR .'..' . DIRECTORY_SEPARATOR 'SOAP' . DIRECTORY_SEPARATOR . 'egiaztatuPasahitza.xml'; //name of the service
	$server = new soap_server;
	$server->configureWSDL('egiaztatuP',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//inplementatu nahi dugun funtzioa erregistratzen dugu
	$server->register('egiaztatuP',
		array('pasahitza'=>'xsd:string',),
		array('erantzuna'=>'xsd:string'),$ns);
	
	//funtzioa inplementatzen dugu
	function egiaztatuP($pasahitza){		
		//Flag bat
		$passTxarra = false;
	
		//Fitxategia irakurtzen da eta edukia aldagai batean gordetzen da
		$fitx = fopen("../Pasahitzak/toppasswords.txt", "r") or die("Unable to open file!");
		while ((($lerroa = fgets($fitx)) !== false) || !$passTxarra) {
			if($lerroa == $pasahitza){
				$passTxarra = true;
			}
		}
		fclose($fitx);
		
		if(passTxarra){
			return "BALIOGABEA";
		}
		else{
			return "BALIOZKOA";
		}
		
	}
	//nusoap klaseko sevice metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>
