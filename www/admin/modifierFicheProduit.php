<?php
	require_once('init_admin.php');
	if (!isset($_SESSION['admin']) && !isset($_GET['id'])
		&& empty($_GET['id']))
	{
		header('Location: admin_connexion.php');
	}
	$pm = new ProduitManager($bdd);
	$p = new Produit($pm->getInfosProduit($_GET['id']));
	$cm = new CategorieManager($bdd);
	$liste_categories = $cm->getAllCategories();
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Page de modification de produit</title>
		 <link rel="stylesheet" href="../../style/style.css">
	</head>
	<body>
		<?php
		require_once("vue_admin/header.php");
		require_once("vue_admin/menuGauche.php");
			echo "<h1>Fiche produit n°" . $p->getId() . "</h1>";
			echo $p->getImage("../");
		?>
		<form action="controleur_admin/supprimerProduit.php" method="post">
			<?php
				echo "<input type='hidden' name='idProduit' value'" . $p->getId() "' />";
			?>
			<input type="submit" value="Supprimer le produit" />
		</form>
		
		<form action="controleur_admin/modifierFicheProduit.php" method="post">
		<?php
			echo "<p><label for='nom'>Nom produit: </label>".
				"<input type='text' id='nom' name='nom' value='" . $p->getNom() 
				. "' /></p>";
			
			echo "<p><label for='description'>Description: </label>".
				"<p> <textarea name='description' id='description' rows='10' cols='50'>" .
				$p->getDescription() . "</textarea> </p>";
				
			echo "<input type='hidden' name='id' value=" . $p->getId() . " />";
				
			echo "<p><label for='prix'>Prix: </label>".
				"<input type='text' name='prix' id='prix' value='" .
				$p->getPrix() . "' />€</p>";
			?>
			
			 <p>
				<label for="categorie">Catégorie: </label>
				<select name="categorie" id="categorie">
		<?php
			foreach ($liste_categories as $value)
			{
				if($value[1] == $p->getCategorie())
				{
					echo "<option selected value='". $value[0] . "'>" . $value[1] . "</option>";
				}
				else 
				{
					echo "<option value='". $value[0] . "'>" . $value[1] . "</option>";
				}
			}
		?>
				</select>
				<input type ="button" value="Ajouter une catégorie" 
				onclick="document.location='ajouterCategorie.php?idProduit=<?php echo $p->getId(); ?>'" />
			<p>
			<p>
				Produit coup de coeur:
				<?php
					if($pm->isCoupCoeur($p))
					{
				?>
					<input type="radio" name="coupdeCoeur" value="oui" id="oui" checked /><label for="oui">Oui</label>
					<input type="radio" name="coupdeCoeur" value="non" id="non" /><label for="non">Non</label>
					<?php
					}
					else {
					?>
					<input type="radio" name="coupdeCoeur" value="oui" id="oui" /><label for="oui">Oui</label>
					<input type="radio" name="coupdeCoeur" value="non" id="non" checked /><label for="non">Non</label>
				<?php
					}
				?>
			</p>
			<input type="submit" value="Valider" /> 
		</form>
	</body>
</html>