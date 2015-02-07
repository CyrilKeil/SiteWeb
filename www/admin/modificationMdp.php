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
		<title>Modification mot de passe</title>
		 <link rel="stylesheet" href="../../style/style.css">
		 <link rel="stylesheet" href="../../style/style_admin.css">
	</head>
	<body>
		<?php
			require_once("vue_admin/header.php");
			require_once("vue_admin/menuGauche.php");
		?>
		<h1>Modification mot de passe</h1>
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
			<form action="controleur_admin/modificationMdp.php" method="post" >
				<p><label for="actumdp">Ancien mot de passe: </label><input type="password" id="actumdp" name="actumdp" /></p>
				<p><label for="newmdp">Nouveau mot de passe: </label><input type="password" id="newmdp" name="newmdp" /></p>
				<p><label for="confirm_mdp">Confirmation du mot de passe: </label>
				<input type="password" id="confirm_mdp" name="confirm_mdp" /></p>
				<p><input type="submit" value="Valider" /></p>
			</form>
		</div>
	</body>
</html>