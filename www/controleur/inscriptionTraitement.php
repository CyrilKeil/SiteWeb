<?php

require_once("connect.php");
	
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$pseudo = $_POST["pseudo"];
	$email = $_POST["email"];
	$adresse = $_POST["adresse"];
	$motdepasse = $_POST["motdepasse"];
	
	$requete = "INSERT INTO clients (pseudo, motdepasse, nom, prenom, email, adresse) VALUES ('".$pseudo."', '".$motdepasse."','".$nom."','".$prenom."','".$email."','".$adresse."')";
	echo $requete;
	mysqli_query($co, $requete) or die("Impossible d'effectuer la requete (inscription)");
	
	header('Location: index.php');

?>