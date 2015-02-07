<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Connexion partie administrateur</title>
	</head>
	<body>
		<?php
		require_once("vue_admin/header.php");
		?>
		<div class="connexion">
			<h1>Connexion</h1>
			<?php
				if(isset($_GET['erreur']) && $_GET['erreur']=='adminInconnu')
				{ ?>
					<span>Identifiants incorects</span>
			<?php
				}
			?>
			<form action='controleur_admin/traitementConnexion.php' method="post">
				<p><label for="pseudo">Pseudo: </label>
					<input type="text" name="pseudo" id="pseudo" />
				</p>
				<p>
					<label for="mdp">Mot de passe: </label>
					<input type="password" id="mdp" name="mdp" />
				</p>
				<p><input type="submit" value="Connexion" /></p>
			</form>
		</div>
	</body>
</html>