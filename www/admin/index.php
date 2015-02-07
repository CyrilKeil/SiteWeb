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
		 <link rel="stylesheet" href="../../style/style.css">
		 <link rel="stylesheet" href="../../style/style_admin.css">
	</head>
	<body>
		<?php
			require_once("vue_admin/header.php");
			require_once("vue_admin/menuGauche.php");
		?>
		<div class="centre">
			<h1>Bienvenue sur la page d'administration de worldwidefood</h1>
			<p> Pour ajouter un article <a href='ajoutProduit.php' class='boite' >Cliquez ici</a></p>
			<p> Pour gérer les catégories <a href='ajouterCategorie.php' class='boite' >Cliquez ici</a></p>
			<p> Pour consulter les différents articles afin d'en modifier ou d'en supprimer <a href="listageProduit.php"  class='boite'>Cliquez ici</a></p>
			<p> Pour ajouter un administrateur <a href='ajoutAdmin.php' class='boite' >Cliquez ici</a></p>
			<p> Pour modifier le mot de passe <a href='modificationMdp.php' class='boite' >Cliquez ici</a></p>
		</div>
	</body>
</html>