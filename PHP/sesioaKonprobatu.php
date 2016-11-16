<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	function eremuBabestua(){
		if(isset($_SESSION['login_user'])){
			if($_SESSION['espezialitatea']==="Irakaslea"){
				echo "<span class='right' style='display:inline; float: right;'><a href='reviewingQuizzes.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			}
			else{
				echo "<span class='right' style='display:inline; float: right;'><a href='handlingQuizes.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			}
			echo "<span class='right' style='display:inline; float: right;'><a href='logOut.php'>LogOut</a> </span>";
		}
		else{
			header("Location: ../HTML/layout.html");
			exit();
		}
	}

	function eremuArrunta(){
		if(isset($_SESSION['login_user'])){
			if($_SESSION['espezialitatea']==="Irakaslea"){
				echo "<span class='right' style='display:inline; float: right;'><a href='reviewingQuizzes.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			}
			else{
				echo "<span class='right' style='display:inline; float: right;'><a href='handlingQuizes.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			}
			echo "<span class='right' style='display:inline; float: right;'><a href='logOut.php'>LogOut</a> </span>";
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

	function irakasleEremua(){
		if(isset($_SESSION['login_user']) && $_SESSION['espezialitatea']==="Irakaslea"){
			echo "<span class='right' style='display:inline; float: right;'><a href='reviewingQuizzes.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a></span><br/>";
			echo "<span class='right' style='display:inline; float: right;'><a href='logOut.php'>LogOut</a> </span>";
		}
		else{
			header("Location: ../HTML/layout.html");
			exit();
		}
	}
	
?>