<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galdera Sartu (AJAX)</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" />
	<link rel="stylesheet" 
		   type="text/css" 
		   media="only screen and (min-width: 530px) and (min-device-width: 481px)"
		   href="../CSS/wide.css" />
	<link rel="stylesheet"
		   type="text/css" 
		   media="only screen and (max-width: 480px)"
		   href="../CSS/smartphone.css" />
	<script type="text/javascript">					
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if ((xhttp.readyState==4)&&(xhttp.status==200 ))
			{ 
				document.getElementById("galderakIkusi").innerHTML= xhttp.responseText;				
			}
		};
		
		function galderakIkusi(){
			xhttp.open("GET","userQuestionsQuery.php", true);
			xhttp.send();
		}
	</script>
  </head>
  <body>
  <div id="page-wrap">
	<header class="main" id="h1">
      	<span class="right" style="display:inline; float: right;"><a href="../HTML/signUp.html">Sign Up</a> </span><br/>
      	<span class="right" style="display:inline; float: right;"><a href="signIn.php">Log In</a> </span>
      	<span class="right" style="display:none; float: right;"><a href="logout.php">LogOut</a> </span>
		<h2>Quizz - Galdera berria sartu (AJAX)</h2>
    </header>
	<nav class="main" id="n1" role="navigation">
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Teachers</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
		
	</nav>
    <section class="main" id="s1">	
		<div id="edukia">
			<form id="erregistro" name="erregistro" method="post" action="./insertQuestion.php" >
				Galdera (*): <br>
				<textarea id="galdera" name="galdera" rows="6" cols="50" maxlength="300" style="resize: none"></textarea><br />
				Erantzuna (*): <br>
				<input type="text" id="erantzuna" name="erantzuna" size="50" maxlength="50"><br />
				Gaia: <br />
				<input type="text" id="gaia" name="gaia" size="50" maxlength="15"><br />
				Zailtasun maila: 
					<select id="zailtasuna" name="zailtasuna">
						<option></option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select><br /><br /><br />
				<input type="submit" value="Galdera gehitu" />
			</form>
			<?php
				include "insertQuestionQuery.php";
			?>
			<input type="button" id="galderakIkusi" name="galderakIkusi" value="Zure galderak ikusi" onClick="galderakIkusi()" />
			
			<div id="seeUserQuestions">
			</div><!--div seeUserQuestions-->
		</div><!--div edukia-->
    </section>
	<footer class="main" id="f1">
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href="https://github.com/julenferre/myquizz" target="_blank">Link GITHUB</a></p>
	</footer>
  </div>
  </body>
</html>