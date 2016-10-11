<?php

	//Izena balidatu
	function izenakCheck($izena){
		$izenaCheck="/([A-Z][a-z]+)(\s[A-Z][a-z]+)*/";

		if(!isset($izena) || empty($izena) || !preg_match($izenaCheck,$izena)) {   
			echo "Iznearen formatua okerra da. <br>";
			return false;
		}
		return true;
	}

	//Abizena balidatu
	function abizenakCheck($abizenak){
		$abizenaCheck="/([A-Z][a-z]+\s[A-Z][a-z]+)(\s[A-Z][a-z]+)*/";

		if(!isset($abizenak) || empty($abizenak) || !preg_match($abizenaCheck,$abizenak)) {   
			echo "Abizenen formatua okerra da. <br>";
			return false;
		}
		return true;
	}

	//Emaila balidatzen da
	function emailCheck($eposta){
		$epostaCheck="/[a-zA-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/";   

		if(!isset($eposta) || empty($eposta) || !preg_match($epostaCheck,$eposta)) {   
			echo "Emailaren formatua okerra da. <br>";
			return false;
		}
		return true;
	}

	//Pasahitza balidatu
	function pasahitzaCheck($pasahitza){
		if(strlen($pasahitza)<6){
			echo "Pasahitza laburregia da. <br>";
			return false;
		}
		return true;
	}

	//Telefonoa balidatu
	function telefonoaCheck($telefonoa){
		$telefonoaCheck="/[0-9]{9}$/";
		if(!isset($telefonoa) || empty($telefonoa) || !preg_match($telefonoaCheck,$telefonoa)) {   
			echo "Telefonoaren formatua okerra da. <br>";
			return false;
		}
		return true;
	}

?>