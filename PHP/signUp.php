<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Sign Up</title>
    <link rel='stylesheet' type='text/css' href='../CSS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../CSS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../CSS/smartphone.css' />
	<script> 
		function irudiAurrekarga(irudia){
			document.getElementById('argazkiAurrekarga').style.display = 'inline';
			document.getElementById('argazkiAurrekarga').src = window.URL.createObjectURL(irudia);
		}
	</script>
	<script src="../JavaScript/signUp.js"></script> <!--<script></script> horrela jartzea beharrezkoa da-->
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      	<span class="right" style="display:inline; float: right;"><a href="signUp.php">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
      	<span class='right' style='display:none; float: right;'><a href='logout.php'>LogOut</a> </span>
		<h2>Sign Up</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Teachers</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
	
	<div id="edukia">
		<form id="erregistro" name="erregistro" method="post" onsubmit="return checkNagusia()" action="./signUp.php" enctype="multipart/form-data" >
			Izena: 
			<input type="text" id="izena" name="izena" pattern="([A-Z][a-z]+)(\s[A-Z][a-z]+)*" required/><font color="red">*</font> <br/>
			Abizenak: 
			<input type="text" id="abizenak" name="abizenak" pattern="([A-Z][a-z]+\s[A-Z][a-z]+)(\s[A-Z][a-z]+)*" required/><font color="red">*</font> <br/>
			Eposta elektronikoa: 
			<input type="text" id="eposta" name="eposta" size="25" pattern="[a-zA-z]+[0-9]{3}(@ikasle\.ehu\.e)u?(s)" required/><font color="red">*</font><br/>
			Pasahitza: 
			<input type="password" id="pasahitza" name="pasahitza" size="25" minlength=6 required/><font color="red">*</font> <br/>
			Telefono zenbakia: 
			<input type="text" id="telefonoa" name="telefonoa" size="10" pattern="[0-9]{9}" required/><font color="red">*</font> <br/>
			Espezialitatea: 
				<select id="espezialitatea" name="espezialitatea" onChange="espezBesteakIkusi()">
					<option>Software ingeniaritza</option>
					<option>Konputagailuen ingeniaritza</option>
					<option>Konputazioa</option>
					<option>Besteak</option>
				</select><font color="red">*</font> 
			<div id="divBesteak" style="display:none">
				<br/><input type="text" id="espez_besteak" name="espez_besteak" placeholder="Idatzi hemen zure espezialitatea" size="50">
			</div><br/>
			Interesa duzun teknologiak eta erremintak: <br />
			<textarea id="tresnak" name="tresnak" style="resize: none; width: 320px; height: 40px"></textarea><br />
			Argazkia: <input type="file" id="argazkia" name="argazkia" onchange="irudiAurrekarga(this.files[0])"> <br/>
			<img id="argazkiAurrekarga" alt="Argazkia" style="display: none; height: 150px; width:auto" /><br/>
			<input type="submit" value="Ados" />
		</form>		
		<?php
			if(isset($_POST['eposta'])){
				//Sesio bat hasten dugu POSTaren datuak bidaltzeko
				session_start();
				$_SESSION['post'] = $_POST;
				
				//nusoap.php klasea gehitzen dugu
				require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'lib'.DIRECTORY_SEPARATOR . 'NuSOAP' . DIRECTORY_SEPARATOR . 'nusoap.php');
				require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'..'.DIRECTORY_SEPARATOR .'lib'.DIRECTORY_SEPARATOR . 'NuSOAP' . DIRECTORY_SEPARATOR . 'class.wsdlcache.php');
				
				//soapclient motadun objektua sortzen dugu
				$soapclient = new nusoap_client( 'http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', false);
				
				//Web-Service-n inplementatu dugun funtzioari dei egiten diogu eta itzultzen diguna inprimatzen dugu
				$erantzuna = $soapclient->call('egiaztatuE',array($_POST['eposta']));
				if($erantzuna === 'BAI'){
					header("Location: enrollWithImage.php");
				}
				else{
					echo "Ikasle hau ez dago Web Sistemak irakasgaian matrikulaturik";
				}
			}
		?>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href='https://github.com/julenferre/myquizz' target="_blank">Link GITHUB</a></p>
	</footer>
  </div>
  </body>
</html>
