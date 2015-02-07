<?php
	require_once('init_admin.php');
	if (!isset($_SESSION['admin']))
	{
		header('Location: admin_connexion.php');
	}
	$cm = new CategorieManager($bdd);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Ajouter produit</title>
		 <link rel="stylesheet" href="../../style/style.css">
		 <link rel="stylesheet" href="../../style/style_admin.css">
	</head>
	<body>
		<?php
			require_once("vue_admin/header.php");
			require_once("vue_admin/menuGauche.php");
			if(isset($_GET['erreur']))
			{ 
			
				
				?>
				<div class='erreur'>
				
				<?php
					if($_GET['erreur'] == "champsManquant"){
						echo "<p>Des champs manquent</p>";
					}
					if($_GET['erreur'] == "problemeFichier"){
						echo "<p>Problème lors du téléchargement de l'image</p>";
					}
					if($_GET['erreur'] == "pasjpg"){
						echo "<p>L'image doit être dans le format jpeg</p>";
					}
					if($_GET['erreur'] == "tropgros"){
						echo "<p>L'image ne doit pas dépasser 100ko</p>";
					}
					
				?>
				</div>		
			<?php
			}
		?>
		<div class="connexion">
		
			<h1>Ajout d'une fiche produit</h1>
			
			<form action="controleur_admin/ajoutFicheProduit.php" method="post" enctype="multipart/form-data">
				
				
				<p>
				<input type="file" id="image" name="image" />
				</p>
				
				<p><label for='nom'>Nom produit: </label>
					<input type='text' id='nom' name='nom' /></p>
				
				<p><label for='description'>Description: </label>
				<textarea name='description' id='description' rows='10' cols='50'> </textarea></p>
				
				<p><label for='prix'>Prix: </label>
					<input type='text' name='prix' id='prix' />€</p>
				
				 <p>
					<label for="categorie">Catégorie: </label>
					<select name="categorie" id="categorie">
			<?php
				foreach ($liste_categories as $value)
				{
				
					echo "<option value='". $value[0] . "'>" . $value[1] . "</option>";
				}
			?>
					</select>
					<input type ="button" value="Ajouter une catégorie" 
					onclick="document.location='ajouterCategorie.php'" />
				</p>
				<p>
					Produit coup de coeur:
						<input type="radio" name="coupdeCoeur" value="oui" id="oui" /><label for="oui">Oui</label>
						<input type="radio" name="coupdeCoeur" value="non" id="non" /><label for="non">Non</label>
				</p>
				<input type="submit" value="Valider" /> 
			</form>
		</div>
	</body>
</html>