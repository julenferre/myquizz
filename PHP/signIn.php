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
  </head>
  <body>
  <div id="page-wrap">
	<header class="main" id="h1">
      	<?php
			include "sesioaKonprobatu.php";
			eremuArrunta();
		?>
		<h2>Sign In</h2>
    </header>
	<nav class="main" id="n1" role="navigation">
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Erabiltzaileak</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">	
		<div id="edukia">
			<form id="erregistro" name="erregistro" method="post" action="./signIn.php" >
				Eposta elektronikoa (*):<input type="text" id="eposta" name="eposta" size="40"><br />
				Pasahitza(*):<input type="password" id="pasahitza" name="pasahitza" size="40"><br/>
				(<a href="pasahitzaAldatu.php">Pasahitza ahaztu egin dut.</a>)<br /><br />
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
					$encpas2 = substr($encpas,0,-10);

					$query = "SELECT Pasahitza, Espezialitatea FROM erabiltzaile WHERE Eposta='$eposta'";

					$erantzuna = $conn->query($query);

					if ($erantzuna->num_rows > 0) {
						$lerroa = $erantzuna->fetch_assoc();
						echo "Pass:.......".$encpas2."<br>";
						echo "DBPass:..".$lerroa["Pasahitza"]."<br>";
						if($lerroa["Pasahitza"]===$encpas2){
							//Sesioaren erabiltzailearen izena bere eposta izango da
							$_SESSION['login_user'] = $eposta;
							$_SESSION['espezialitatea'] = $lerroa['Espezialitatea'];
							//konexioak taulan erregistro berria sartzen dugu
							$data = date('Y/m/d H:i:s');
							$query = "INSERT INTO konexioak VALUES ('','$eposta','$data')";
							if($conn->query($query) === TRUE) {
								$query = "SELECT id FROM konexioak WHERE erab_eposta='$eposta' and ordua='$data'";
								$erantzuna = $conn->query($query);
								if ($erantzuna->num_rows > 0) {
									while($lerroa = $erantzuna->fetch_assoc()) {
										$_SESSION['konexio_id'] = $lerroa['id'];
									}
								}
								if($_SESSION['espezialitatea']=="Irakaslea"){
									header("Location: reviewingQuizzes.php");
								}
								else{
									//Galdera sartzera pasatzen gara
									//header("Location: insertQuestion.php");
									header("Location: handlingQuizes.php");
								}
								exit;
							}
							else{
								echo "<h2>Datuak ez dira sartu: " . $query . "</h2><br>" . $conn->error;
							}
						}
						else{
							echo "<br/><br/><font color='red'>Pasahitza okerra</font>";
						}
					}
					else{
						echo "<br/><br/><font color='red'>Erabiltzaile okerra</font>";
					}

					$conn->close();
				};
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