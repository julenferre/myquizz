function checkNagusia() {
    var sAuxErr = "";
    var balioDu = true;
    var frm = document.getElementById("erregistro");
    for (i = 0; i < frm.elements.length - 1; i++) {
        if (frm.elements[i].value == "" && frm.elements[i].name!="tresnak" && frm.elements[i].name!="espez_besteak" && frm.elements[i].name!="argazkia"){
            sAuxErr += "Ez daude derrigorrezko datu guztiak sartuta.\n";
            balioDu = false;
        }
        else{
            if (frm.elements[i].name == "izena"){
                if (izenaCheck()==false) {
                    sAuxErr += "Izenaren formatua okerra da.\n";
                    balioDu = false;
                }
            }
			if (frm.elements[i].name == "abizenak"){
                if (abizenakCheck()==false) {
                    sAuxErr += "Abizenen formatua okerra da.\n";
                    balioDu = false;
                }
            }
            if (frm.elements[i].name == "eposta") {
                if (emailaCheck()==false) {
                    sAuxErr += "Emailaren formatua okerra da.\n";
                    balioDu = false;
                }
            }
            if (frm.elements[i].name == "pasahitza") {
                if(pasahitzaCheck()==false){
                    sAuxErr += "Pasahitza 6 karaktere edo gehiagoko luzeera izan behar du.\n";
					frm.elements[i].value = "";
                    balioDu = false;
                }
            }
            if (frm.elements[i].name == "telefonoa") {
                if(telefonoaCheck()==false){
                    sAuxErr += "Telefonoa 9 zenbakiz osatuta egon behar da.\n";
                    balioDu = false;
                }
            }
        }
        if (balioDu==false) {
            alert(sAuxErr);
            break;
        }
    }
    if(!pasaitzaBaieztatu()){
         balioDu = false;
    }
	return balioDu;
}
function ikusBalioak() {
    var sAux = "";
    var balioDu = true;
    var frm = document.getElementById("erregistro");
    for (i = 0; i < frm.elements.length - 1; i++) {
        sAux += "IZENA: " + frm.elements[i].name + " \t ";
        sAux += "BALIOA: " + frm.elements[i].value + "\n";
    }
    alert(sAux);
}
function izenaCheck() {
    var de = document.getElementById("izena").value;
    var deitRE = /([A-Z][a-z]+)(\s[A-Z][a-z]+)*/;
    return deitRE.test(de);
}
function abizenakCheck() {
    var de = document.getElementById("abizenak").value;
    var deitRE = /([A-Z][a-z]+\s[A-Z][a-z]+)(\s[A-Z][a-z]+)*/;
    return deitRE.test(de);
}
function emailaCheck() {
    var em = document.getElementById("eposta").value;
    var emailRE = /[a-zA-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)/;
    return emailRE.test(em);
	return true;
}
function pasahitzaCheck() {
    var pa = document.getElementById("pasahitza").value;
	return pa.length >= 6;
}
function telefonoaCheck() {
    var tl = document.getElementById("telefonoa").value;	
	var tlfRE = /[0-9]{9}$/;
	return (tl.length == 9 && tlfRE.test(tl));
}
function pasahitzaBaieztatu(){
    pass = document.getElementById("pasahitza");
    passBaieztatu = document.getElementById("pasahitzaErrepikatu"); 
    if(pass.value != passBaieztatu.value){
        alert("Pasahitzak ez du kointziditzen");
        return false;
    }
    return true;
}
function espezBesteakIkusi() {
	if(document.getElementById("espezialitatea").value=="Besteak"){
		document.getElementById("divBesteak").style.display = "inline";
	}
	else {
		document.getElementById("divBesteak").style.display = "none";
	}
}