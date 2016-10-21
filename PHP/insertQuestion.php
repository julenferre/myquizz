<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galdera Sartu</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" />
	<link rel="stylesheet" 
		   type="text/css" 
		   media="only screen and (min-width: 530px) and (min-device-width: 481px)"
		   href="../CSS/wide.css" />
	<link rel="stylesheet"
		   type="text/css" 
		   media="only screen and (max-width: 480px)"
		   href="../CSS/smartphone.css" />
	<script src="../JavaScript/signUp.js"></script> <!--<script></script> horrela jartzea beharrezkoa da-->
  </head>
  <body>
  <div id="page-wrap">
	<header class="main" id="h1">
      	<span class="right" style="display:inline; float: right;"><a href="../HTML/signUp.html">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
      	<span class="right" style="display:none; float: right;"><a href="logout.php">LogOut</a> </span>
		<h2>Quizz - Galdera berria sartu</h2>
    </header>
	<nav class="main" id="n1" role="navigation">
		<span><a href="../HTML/layout.html">Home</a></span>
		<span><a href="questions.php">Quizzes</a></span>
		<span><a href="../HTML/credits.html">Credits</a></span>
	</nav>
    <section class="main" id="s1">	
		<div id="edukia">
			<form id="erregistro" name="erregistro" method="post" action="./insertQuestion.php" >
				Galdera (*): <br>
				<textarea id="galdera" name="galdera" rows="6" cols="50" maxlength="300" style="resize: none"></textarea><br />
				Erantzuna (*): <br>
				<input type="text" id="erantzuna" name="erantzuna" size="50" maxlength="50"><br />
				Zailtasun maila: 
					<select id="zailtasuna" name="zailtasuna">
						<option></option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select><br>
				<input type="submit" value="Galdera gehitu" />
			</form>
			<?php
				include "baliostapenak.php";
				
				if(isset($_POST['galdera'])){
					//DDBBra konektatu
					include "connect.php";
					
					// Datuak bidali
					$galdera = $_POST['galdera'];
					$erantzuna = $_POST['erantzuna'];
					$zailtasuna = $_POST['zailtasuna'];
					if(galderaCheck($galdera) && erantzunaCheck($erantzuna)){
						$eposta = $_SESSION['login_user'];
						$query = "INSERT INTO galderak VALUES ('','$eposta','$galdera', '$erantzuna', '$zailtasuna')";	
						if($conn->query($query) === TRUE) {
							//XML fitxategia ireki
							$xml = simplexml_load_file("../XML/galderak.xml");
							//Informazioa duten semeak sortu
							$child = $xml->addChild('assessmentItem');
							$galderaXML = $child->addChild('itemBody');
							$galderaXML->addChild('p',$galdera);
							$erantzunaXML = $child->addChild('correctResponse');
							$erantzunaXML->addChild('value', $erantzuna);

							$domAttribute = $child->addAttribute('complexity',$zailtasuna);
							$domAttribute = $child->addAttribute('subject','');
							//Fitxategia gorde
							$xml->asXML("../XML/galderak.xml");

							echo "<br/><br/><font color='green'>Datuak ondo sartu dira</font><br>";
							//ekintzak taulan datuak sartzen dira
							$kon_id = $_SESSION['konexio_id'];
							$mota = "Galdera sartu";
							$ordua = date('Y/m/d H:i:s');
							$ip = $_SERVER['REMOTE_ADDR'];
							$query = "INSERT INTO ekintzak VALUES ('','$kon_id','$eposta', '$mota', '$ordua', '$ip')";
							if($conn->query($query) === FALSE) {
								echo "<br/><br/><font color='red'>Ekintzaren datuak ez dira gorde: </font>". $query . "</h2><br>" . $conn->error;
							}
						}
						else{
							echo "<br/><br/><h2><font color='red'>Datuak ez dira sartu: </font>" . $query . "</h2><br>" . $conn->error;
						}
					}
					
					$conn->close();
				}
			?>
		</div>
    </section>
	<footer class="main" id="f1">
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href="https://github.com/julenferre/myquizz" target="_blank">Link GITHUB</a></p>
	</footer>
  </div>
  </body>
</html>