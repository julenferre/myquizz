<?php

	//Izena balidatu
	function izenakCheck($izena){
		$izenaCheck="/([A-Z][a-z]+)(\s[A-Z][a-z]+)*/";
		$vardump = filter_var($izena, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>$izenaCheck)));
		if(empty($vardump)) {   
			echo "Izenaren formatua okerra da.";
			return false;
		}
		return true;
	}

	//Abizena balidatu
	function abizenakCheck($abizenak){
		$abizenaCheck="/([A-Z][a-z]+\s[A-Z][a-z]+)(\s[A-Z][a-z]+)*/";
		$vardump = filter_var($abizenak, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>$abizenaCheck)));
		if(empty($vardump)) {     
			echo "Abizenen formatua okerra da.";
			return false;
		}
		return true;
	}

	//Emaila balidatzen da
	function emailCheck($eposta){
		$epostaCheck="/[a-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/";   
		$vardump = filter_var($eposta, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>$epostaCheck)));
		if(empty($vardump)) {      
			echo "Emailaren formatua okerra da.";
			return false;
		}
		return true;
	}

	//Pasahitza balidatu
	function pasahitzaCheck($pasahitza){
		if(strlen($pasahitza)<6){
			echo "Pasahitza laburregia da.";
			return false;
		}
		return true;
	}

	//Telefonoa balidatu
	function telefonoaCheck($telefonoa){
		$telefonoaCheck="/[0-9]{9}$/";
		$vardump = filter_var($telefonoa, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>$telefonoaCheck)));
		if(empty($vardump)) {
			echo "Telefonoaren formatua okerra da.";
			return false;
		}
		return true;
	}
	
	//Galdera balidatu
	function galderaCheck($galdera){
		if(empty($galdera)) {
			echo "Zerbait idatzi 'Galdera' eremuan.";
			return false;
		}
		return true;
	}
	
	//Erantzuna balidatu
	function erantzunaCheck($erantzuna){
		if(empty($erantzuna)) {
			echo "Zerbait idatzi 'Erantzuna' eremuan.";
			return false;
		}
		return true;
	}

?>