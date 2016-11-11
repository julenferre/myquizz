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
	<script>
		function eguneratuGaldera(zbk){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200)){
					alert(xhttp.responseText);
				}
			};
			xhttp.open("GET","../PHP/updateQuestionQuery.php", true);
			xhttp.send();
		}
		function ezabatuGaldera(zbk){
			var form = document.getElementById('form'+zbk);
			form.getElementById('ekintza').value='Ezabatu';
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if ((xhttp.readyState==4)&&(xhttp.status==200)){
					alert(xhttp.responseText);
					if(xhttp.responseText == "Galdera ondo ezabatu da"){
						location.reload();
					}
				}
			};
			xhttp.open("GET","../PHP/updateQuestionQuery.php", true);
			xhttp.send();
		}
	</script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      	<span class="right" style="display:inline; float: right;"><a href="../HTML/signUp.html">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
		<span class="right" style="display:none; float: right;"><a href="logout.php">LogOut</a> </span>
		<h2>Reviewing Questions</h2>
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
			include "editQuestion.php";
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
