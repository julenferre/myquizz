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
            if (frm.elements[i].name == "deitura"){
                if (deituraCheck()==false) {
                    sAuxErr += "Deituraren formatua okerra da.\n";
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
            break;
        }
    }
    if(balioDu==true) { ikusBalioak(); }
    else { alert(sAuxErr); }
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
function deituraCheck() {
    var de = document.getElementById("deitura").value;
<<<<<<< HEAD
    //var deitRE = /\w{3}/;
	//var deitRE = /([A-Za-z\s]+)()([A-Za-z\s]+)([A-Za-z]\s+)/;
=======
    var deitRE = /(\w+\s)(\w+\s)(\w+)/;
>>>>>>> 8cfed32c5e3892e392c54f5320037807c4df3644
    return deitRE.test(de);
}
function emailaCheck() {
    var em = document.getElementById("eposta").value;
    var emailRE = /[a-zA-z]+[0-9]{3}(@ikasle.ehu.e)u?(s)/;
    return emailRE.test(em);
}
function pasahitzaCheck() {
    var pa = document.getElementById("pasahitza").value;
	return pa.length >= 6;
}
function telefonoaCheck() {
    var tl = document.getElementById("telefonoa").value;	
    //var tlfRE = /^[0-8]{1,10}$/;
	var tlfRE = /[0-9]{9}$/;
	return (tl.length == 9 && tlfRE.test(tl));
}
function espezBesteakIkusi() {
	if(document.getElementById("espezialitatea").value=="Besteak"){
		document.getElementById("espez_besteak").style.display = "inline";
	}
	else {
		document.getElementById("espez_besteak").style.display = "none";
	}
}
