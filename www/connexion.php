<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="style.css" />
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			include("vue/header.php");
			include("vue/menuGauche.php");
		?>
		<div class="corps">
			<!-- Formulaires connexion -->
			<div class="connexion">
				<p class="title">Connexion</p>
				<form action="controleur/connexionTraitement.php" method="POST">
					<p><label for="pseudo">Pseudo </label><input type="text" name="pseudo" id="pseudo" /></p>
					<p><label for="motdepasse">Mot de passe </label><input type="password" name="motdepasse" id="motdepasse" /></p>
					<p class="center"><input type="submit" value="Connexion" id="connect" class="center"/></p>
				</form>
			</div>
			<!-- Formulaires inscription -->
			<div class="inscription">
				<p class="title">Inscription</p>
				<form action="controleur/inscriptionTraitement.php" method="POST">
					<p><label for="name">Nom </label><input type="text" name="nom" id="nom" /></p>
					<p><label for="prenom">Prenom </label><input type="text" name="prenom" id="prenom" /></p>
					<p><label for="pseudo">Pseudo </label><input type="text" name="pseudo" id="pseudo" /></p>
					<p><label for="email">E-mail </label><input type="text" name="email" id="email" /></p>
					<p><label for="adresse">Adresse </label><input type="text" name="adresse" id="adresse" /></p>
					<p><label for="motdepasse">Mot de passe </label><input type="password" name="motdepasse" id="motdepasse" /></p>
					<p class="center"><input type="submit" value="S'inscrire" /></p>
				</form>
			</div>
		</div>
	</body>
</html>