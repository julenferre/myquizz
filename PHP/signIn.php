<?php

	if(isset($_POST['eposta'])){
		//LOCALHOST
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$ddbb = "quiz";
		
		//HOSTINGER
		$serverH = "mysql.hostinger.es";
		$userH = "u823979798_admin";
		$passH = "adminroot";
		$ddbbH = "u823979798_quiz";
		
		$conn = new mysqli($servername, $username, $password, $ddbb); //LOCALHOST
		//$conn = new mysqli($serverH, $userH, $passH, $ddbbH); //HOSTINGER
		
		//Konexioa konprobatu
		if (!$conn) {
			die("Ezin izan da konexioa ezarri: " . $conn->connect_error);
		}
		
		// Datuak bidali
		$eposta = $_POST['eposta'];
		$pasahitza = $_POST['pasahitza'];

		$query = "SELECT Pasahitza FROM Erabiltzaile WHERE Eposta='$eposta'";

		$erantzuna = $conn->query($query);

		if ($erantzuna->num_rows > 0) {
			$lerroa = $erantzuna->fetch_assoc();
			if($lerroa["Pasahitza"]===$pasahitza){
				header("Location: insertQuestion.php");
				exit;
			}
			else{
				echo "Pasahitz okerra.";
			}
		}
		else{
			echo "Erabiltzaile okerra.";
		}

		$conn->close();
	};

?>

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
		   media="only screen and (max-width: 480px)'
		   href="../CSS/smartphone.css" />
	<script src="../JavaScript/signUp.js"></script> <!--<script></script> horrela jartzea beharrezkoa da-->
  </head>
  <body>
  <div id="page-wrap">
	<header class="main" id="h1">
      	<span class="right" style="display:inline; float: right;"><a href="../HTML/signUp.html">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
      	<span class="right" style="display:none; float: right;"><a href="/logout">LogOut</a> </span>
		<h2>Sign Up</h2>
    </header>
	<nav class="main" id="n1" role="navigation">
		<span><a href="../HTML/layout.html">Home</a></span>
		<span><a href="../HTML/questions.html">Quizzes</a></span>
		<span><a href="../HTML/credits.html">Credits</a></span>
	</nav>
    <section class="main" id="s1">
	
	<div>
		<form id="erregistro" name="erregistro" style="text-align:center;" method="post" action="./signIn.php" >
			Eposta elektronikoa (*): <input type="text" id="eposta" name="eposta" size="40"><br />
			Pasahitza(*):  <input type="password" id="pasahitza" name="pasahitza" size="40"><br />
			<a href="">Pasahitza ahaztu egin dut.</a> <br /><br />
			<input type="submit" value="Ados" />
		</form>
	</div>
    </section>
	<footer class="main" id="f1">
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href="https://github.com/julenferre/myquizz" target="_blank">Link GITHUB</a></p>
	</footer>
  </div>
  </body>
</html>