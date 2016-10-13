<?php
	
	include "baliostapenak.php";
	
	if(isset($_POST['galdera']) && isset($_POST['erantzuna'])){
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
				echo "<script>alert('Datuak ondo sartu dira');</script>";
			}
			else{
				echo "<h2>Datuak ez dira sartu: " . $query . "</h2><br>" . $conn->error;
			}
		}
		
		$conn->close();
	}
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
		   media="only screen and (max-width: 480px)"
		   href="../CSS/smartphone.css" />
	<script src="../JavaScript/signUp.js"></script> <!--<script></script> horrela jartzea beharrezkoa da-->
  </head>
  <body>
  <div id="page-wrap">
	<header class="main" id="h1">
      	<span class="right" style="display:inline; float: right;"><a href="../HTML/signUp.html">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
      	<span class="right" style="display:none; float: right;"><a href="logOut.php">LogOut</a> </span>
		<h2>Quizz - Galdera berria sartu</h2>
    </header>
	<nav class="main" id="n1" role="navigation">
		<span><a href="../HTML/layout.html">Home</a></span>
		<span><a href="questions.php">Quizzes</a></span>
		<span><a href="../HTML/credits.html">Credits</a></span>
	</nav>
    <section class="main" id="s1">
	
	<div>
		<form id="erregistro" name="erregistro" style="text-align:center;" method="post" action="./insertQuestion.php" >
			Galdera (*): <textarea id="galdera" name="galdera" rows="6" cols="50" maxlength="300"></textarea><br />
			Erantzuna (*):  <input type="text" id="erantzuna" name="erantzuna" size="50" maxlength="50"><br />
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
	</div>
    </section>
	<footer class="main" id="f1">
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href="https://github.com/julenferre/myquizz" target="_blank">Link GITHUB</a></p>
	</footer>
  </div>
  </body>
</html>