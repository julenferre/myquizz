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
		<?php
			include "sesioaKonprobatu.php";
			eremuArrunta();
		?>   
		<h2>Questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Erabiltzaileak</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
	<div id="edukia" style="height: 55%; border: 1px solid black; background: white; overflow:auto;">
		<?php
			include "questionsQuery.php";
		?>
	</div>
	<div id="EdukiEstekak">
		<p>XML galderak taulan ikusteko (PHP), <a href="seeXMLquestions.php">klikatu hemen</a> (Derrigorrezko zatia)</p>
		<br>
		<p>XML galderak taulan ikusteko (XSL), <a href="../XML/galderak.xml">klikatu hemen</a> (Hautazko zatia)</p>
		<br>
		<?php
			if(isset($_SESSION['login_user'])){
				echo "<input type='button' class='galderaGehituBotoia' onClick=\"location.href='handlingQuizes.php'\" value='Galdera gehitu'></input>";
			}
			else{
				echo "<p>Galdera berriak sartzeko, <a href='signIn.php'>identifikatu zaitez</a></p>";
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
