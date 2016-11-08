var zerbitzarikoErantzuna;
function zerbPos(){
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	} else {
		zerbitzarikoErantzuna = "Geolokalizazioa ez dago eskuragai arakatzaile honetan.";
	}
}
function showPosition(position) {
	zerbitzarikoErantzuna = "Zerbitzariaren koordenatuak -> latitudea: " + position.coords.latitude +", longitudea: " + position.coords.longitude
}
function getServerPos(){
	return zerbitzarikoErantzuna;
}
