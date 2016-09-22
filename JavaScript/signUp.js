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
            if (frm.elements[i].name == "deitura")
            {
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
        sAux += "IZENA: " + frm.elements[i].name + " - ";
        sAux += "BALIOA: " + frm.elements[i].value + "\n";
    }
    alert(sAux);
}
function deituraCheck() {
    var de = document.getElementById("deitura").value;
    var deitRE = /[A-Za-z]{3}/;
    return deitRE.test(de);
}
function emailaCheck() {
    var em = document.getElementById("eposta").value;
    var emailRE = /[a-zA-z]+[0-9]{3}@ikasle.ehu.e(u)s/;
    return emailRE.test(em);
}
function pasahitzaCheck() {
    var pa = document.getElementById("pasahitza").value;
    if (pa.value.length < 6) {
        return false;
    }
    return true;
}
function telefonoaCheck() {
    var tl = document.getElementById("telefonoa").value;
    if (tl.length != 9) {
        return false;
    }
    var tlfRE = / {9} /;
    return tlfRE.test(tl);
}
function espezBesteakBistaratu() {
    document.getElementById("espez_besteak").style.visibility = "visible";
}
function espezBesteakEzkutatu() {
    document.getElementById("espez_besteak").style.visibility = "hidden";
}
