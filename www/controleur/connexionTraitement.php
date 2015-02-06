<?php

require_once("connect.php");

	$pseudo = $_POST["pseudo"];
	$motdepasse = $_POST["motdepasse"];
	
	$requete = "SELECT * FROM clients WHERE pseudo = '" . $pseudo . "' AND motdepasse = '" . $motdepasse . "'";
	$resultat = mysqli_query($co, $requete) or die("Impossible d'effectuer la requete (connexion)");
	$nb = mysqli_num_rows($resultat);
	if($nb == 1){
		setcookie("pseudo", $pseudo, time() + 365*24*3600);
		header('Location: index.php');
	}
	else{
		echo "Mauvaise combinaison ?";
	}


?>