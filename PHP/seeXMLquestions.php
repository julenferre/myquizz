<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>XML galderak ikusi</title>
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
		<h2>XML galderak ikusi</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../HTML/layout.html'>Home</a></span>
		<span><a href='../PHP/questions.php'>Quizzes</a></span>
		<span><a href='../HTML/getUserInform.html'>Erabiltzaileak</a></span>
		<span><a href='../HTML/credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
	<div id="edukia">
		<table>
		<tr><td><b>Galdera</b></td><td><b>Konplexutasuna</b></td><td><b>Gaia</b></td></tr>	
		<?php
			$galderak = simplexml_load_file('../XML/galderak.xml');
			foreach ($galderak->xpath('//assessmentItem') as $galdera)
			{				
				foreach ($galdera->itemBody as $enuntziatua)
				{ 
					echo utf8_decode("<tr><td>$enuntziatua->p</td><td>$galdera[complexity]</td><td>$galdera[subject]</td></tr>");
				}				
			}
		?>
		</table>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<p><a href='https://github.com/julenferre/myquizz' target="_blank">Link GITHUB</a></p>
	</footer>
</div>
</body>
</html>
