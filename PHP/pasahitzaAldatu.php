<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" />
	<link rel="stylesheet" 
		   type="text/css" 
		   media="only screen and (min-width: 530px) and (min-device-width: 481px)"
		   href="../CSS/wide.css" />
	<link rel="stylesheet"
		   type="text/css" 
		   media="only screen and (max-width: 480px)"
		   href="../CSS/smartphone.css" />
	<script>
		var pasahitzaOndo = false;
		function checkPasahitza(pasahitza){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200)){
					if(xhttp.responseText == "BALIOZKOA"){
						pasahitzaOndo = true;
						document.getElementById("pasahitzaOnaErantzuna").style = "display:none";
					}
					else if(xhttp.responseText == "BALIOGABEA"){
						pasahitzaOndo = false;
						document.getElementById("pasahitzaOnaErantzuna").style = "display:inline";
					}
				}
			};
			xhttp.open("GET","../PHP/egiaztatuPasahitzaBezeroa.php?pasahitza=" + pasahitza, true);
			xhttp.send();
		}
		function checkAll(){
			var ps1 = document.getElementById("pasahitza");
			if(!pasahitzaOndo || !pasahitzaBaieztatu()){
				return false;
			}
			else{
				return true;
			}
		}
	</script>
    <script src="../JavaScript/signUp.js"></script>
  </head>
  <body>
  <div id="page-wrap">
	<header class="main" id="h1">
      	<?php
			include "sesioaKonprobatu.php";
			eremuArrunta();
		?>
		<h2>Pasahitza aldatu</h2>
    </header>
	<nav class="main" id="n1" role="navigation">
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Erabiltzaileak</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">	
		<div id="edukia">
			<form id="erregistro" name="erregistro" method="post" onsubmit="return checkAll()" action="./pasahitzaAldatu.php" >
				Eposta elektronikoa (*):<input type="text" id="eposta" name="eposta" size="40" required><br />
				Pasahitza berria(*):<input type="password" id="pasahitza" name="pasahitza" size="40" required onblur="checkPasahitza(pasahitza.value)"><br/>
				Pasahitza errepikatu(*):<input type="password" id="pasahitzaErrepikatu" name="pasahitzaErrepikatu" size="40" required onblur="pasahitzaBaieztatu()"><br/>
				<input type="submit" value="Ados" /><br /><br />
				<a href="../HTML/layout.html">Orrialde nagusira bueltatu</a> 
			</form>
			<?php
				if(isset($_POST['eposta'])){
					//DDBBra konektatu		
					include "connect.php";
					// Datuak bidali
					$eposta = $_POST['eposta'];
					$pasahitza = $_POST['pasahitza'];
					$encpas = sha1($pasahitza);

					$query = "UPDATE erabiltzaile SET pasahitza='$encpas' WHERE eposta='$eposta'";

					$erantzuna = $conn->query($query);

					if ($conn->query($query)===TRUE) {
						echo "<h2>Pasahitza ondo eguneratu da.</h2>";
						
						//Ekintzak taulan datuak sartzen dira
						$mota = "Pasahitza eguneratu";
						$ordua = date('Y/m/d H:i:s');
						$ip = $_SERVER['REMOTE_ADDR'];
						$query = "INSERT INTO ekintzak VALUES ('','','$eposta', '$mota', '$ordua', '$ip')";
						if($conn->query($query) === FALSE) {
							echo "<font color='red'>Ekintzaren datuak ez dira gorde: </font>". $query . "</h2><br>" . $conn->error;
						}
					}
					else{
						echo "Datuak ez dira eguneratu: " . $query . "<br>" . $conn->error;
					}
					
					$conn->close();
				};
			?>
			<div id="pasahitzaOnaErantzuna" style="display: none"><font color='red'>Pasahitza hori ahula da</font></div>
		</div>
    </section>
	<footer class="main" id="f1">
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href="https://github.com/julenferre/myquizz" target="_blank">Link GITHUB</a></p>
	</footer>
  </div>
  </body>
</html>