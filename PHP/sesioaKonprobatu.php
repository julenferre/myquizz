<?php

	session_start();

	function eremuBabestua(){
		if(isset($_SESSION['login_user'])){
			echo "<span class='right' style='display:inline; float: right;'><a href='#'>" . split('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			echo "<span class='right' style='display:inline; float: right;'><a href='logout.php'>LogOut</a> </span>";
		}
		else{
			header("Location: ../HTML/layout.html");
			exit();
		}
	}

	function eremuArrunta(){
		if(isset($_SESSION['login_user'])){
			echo "<span class='right' style='display:inline; float: right;'><a href='#'>" . split('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			echo "<span class='right' style='display:inline; float: right;'><a href='logout.php'>LogOut</a> </span>";
		}
		else{
			echo "<span class='right' style='display:inline; float: right;'><a href='../HTML/signUp.html'>Sign Up</a> </span><br/>";
  			echo "<span class='right' style='display:inline; float: right;'><a href='signIn.php'>Log In</a> </span>";
		}
	}

	function blokeatuSarreta(){
		if(!isset($_SESSION['login_user'])){
			header("Location: ../HTML/layout.html");
			exit();
		}
	}
	
?>