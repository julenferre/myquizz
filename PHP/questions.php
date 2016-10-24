<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quiz</title>
    <link rel='stylesheet' type='text/css' href='../CSS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../CSS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../CSS/smartphone.css' />
		   
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      	<span class="right" style="display:inline; float: right;"><a href="../HTML/signUp.html">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
		<span class="right" style="display:none; float: right;"><a href="logout.php">LogOut</a> </span>
		<h2>Questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Teachers</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
	<div id="edukia">
		<?php
			//DDBBra konektatu		
			include "connect.php";
			
			// Datuak jaso
			$query = "SELECT * FROM galderak";
				
			$erantzuna = $conn->query($query);
			
			if ($erantzuna->num_rows > 0) {
				while($lerroa = $erantzuna->fetch_assoc()) {
					echo " -> <b>" .$lerroa['gaia']. ":</b> " . $lerroa['galdera'] . " (Zailtasun maila: " . $lerroa['maila'] . ")<br>";
				}
			} else {
				echo "Ez dago galderarik";
			}
			//ekintzak taulan datuak sartzen dira			
			$eposta = NULL;
			$kon_id = NULL;
			if(session_id() == ''){
				$eposta = $_SESSION['login_user'];
				$kon_id = $_SESSION['konexio_id'];
			}
			$mota = "Galderak ikusi";
			$ordua = date('Y/m/d H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			$query = "INSERT INTO ekintzak VALUES ('','$kon_id','$eposta', '$mota', '$ordua', '$ip')";
			if($conn->query($query) === FALSE) {
				echo "<br/><br/><font color='red'>Ekintzaren datuak ez dira gorde: </font>". $query . "</h2><br>" . $conn->error;
			}
			
			$conn->close();
		?>
		<br>
		<p>Galderak taulan ikusteko, <a href="seeXMLquestions.php">klikatu hemen</a></p>
		<br><br>
		<p>Galdera berriak sartzeko, <a href="signIn.php">identifikatu zaitez</a></p>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href='https://github.com/julenferre/myquizz' target="_blank">Link GITHUB</a></p>
	</footer>
</div>
</body>
</html>
