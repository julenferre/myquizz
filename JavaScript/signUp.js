function ikusBalioak() {
	var sAux = "";
	var sAuxErr = "";
	var balioDu = true;
	var arg = document.getElementById("argazkia");
	var frm = document.getElementById("erregistro");
	for (i = 1; i < frm.elements.length; i++) {
		sAux += "IZENA: " + frm.elements[i].name + " - ";
		sAux += "BALIOA: " + frm.elements[i].value + "\n";
		if (frm.elements[i].value != NULL) {

			if (frm.elements[i].name == "pasahitza" && frm.elements[i].value.length < 6) {
				sAuxErr += "Pasahitza 6 karaktere edo gehiagoko luzeera izan behar du.\n";
				balioDu = false;
			}
			if (frm.elements[i].name == "eposta") {
				if (!emailaCheck(frm.elements[i])) {
					sAuxErr += "Pasahitza 6 karaktere edo gehiagoko luzeera izan behar du.\n";
					balioDu = false;
				}
			}
		} else {
			balioDu = false
		}
		if (!balioDu) {
			break;
		}
	}
	if (!balioDu) {
		alert(sAuxErr);
	} else {
		alert(sAux);
	}
	alert(arg);
}

function emailaCheck(e1) {
	if (e1.value.indexOf("([A-Z]*[a-z]*)+[0-9][0-9][0-9]@ikasle.ehu.e(u)s") == -1) {
		return false;
	} else
		return true;
}

function espezBesteakBistaratu() {
	document.getElementById("espez_besteak").style.visibility = "visible";
}
function espezBesteakEzkutatu() {
	document.getElementById("espez_besteak").style.visibility = "hidden";
}
