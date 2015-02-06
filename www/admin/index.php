<?php
	require_once('init_admin.php');
	if (!isset($_SESSION['admin']))
	{
		header('Location: admin_connexion.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Page d'administration</title>
	</head>
	<body>
		<h1>Bienvenue sur la page d'administration de worldwidefood</h1>
		<p> Pour ajouter un article <a href='admin_ajoutArticle.php' >Cliquez ici</a></p>
		<p> Pour gérer les catégories <a href='ajouterCategorie.php' >Cliquez ici</a></p>
		<p> Pour consulter les différents articles afin d'en modifier ou d'en ajouter <a href="../index.php">Cliquez ici</a></p>
		<p> Pour ajouter un administrateur <a href='ajoutAdmin.php' >Cliquez ici</a></p>
	</body>
</html>