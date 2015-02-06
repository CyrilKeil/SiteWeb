<?php
	$host = "localhost";
	$bddname = "worldwidefood";
	$user = "root";
	$passwd = "";
	$bdd = mysqli_connect($host , $user , $passwd, $bddname) or die("erreur de connexion");
	mysqli_set_charset($bdd,"utf8")
?>