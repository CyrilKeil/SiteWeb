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
		<title>Ajout d'un nouvel administrateur</title>
		 <link rel="stylesheet" href="../../style/style.css">
		 <link rel="stylesheet" href="../../style/style_admin.css">
	</head>
	<body>
		<?php
			require_once("vue_admin/header.php");
			require_once("vue_admin/menuGauche.php");
		?>
		<h1>Ajout d'un nouvel administrateur</h1>
		<?php
			if(isset($_GET['erreur']))
			{
				?>
				<div class="erreur">
					<p>Certains champs manquent ou les deux mots de passe ne sont pas identiques</p>
				</div>
				<?php
			}
		?>
		<div class="centre">
			<form action="controleur_admin/ajoutAdmin.php" method="post" >
				<p><label for="login">Login: </label><input type="text" id="login" name="login" /></p>
				<p><label for="mdp">Mot de passe: </label><input type="password" id="mdp" name="mdp" /></p>
				<p><label for="confirm_mdp">Confirmation du mot de passe: </label>
				<input type="password" id="confirm_mdp" name="confirm_mdp" /></p>
				<p><input type="submit" value="Valider" /></p>
			</form>
		</div>
	</body>
</html>