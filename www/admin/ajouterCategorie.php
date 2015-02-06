<?php
	require_once('init_admin.php');
	if (!isset($_SESSION['admin']))
	{
		header('Location: admin_connexion.php');
	}
	
	$idProduit = 0;
	if(isset($_GET['idProduit']) && !empty($_GET['idProduit']))
	{
		$idProduit = $_GET['idProduit'];
	}
	

	$cm = new CategorieManager($bdd);
	$liste_categories = $cm->getAllCategories();
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Gestion des catégories</title>
		 <link rel="stylesheet" href="../../style/style.css">
		 <link rel="stylesheet" href="../../style/style_admin.css">
	</head>
	<body>
		<?php
			require_once("vue_admin/header.php");
			require_once("vue_admin/menuGauche.php");
		?>
		
		
		<h2>Modification ou suppression d'une catégorie</h2>
		<form action="controleur_admin/modifierCategorie.php" method="post">
		<?php
			echo "<input type='hidden' name='idProduit' id='idProduit' value='" . $idProduit . "' />";
		?>
			<input type="hidden" name="idCategorie" id="idCategorie" />
			<p>
				<label for="categorieActu">Catégories actuelles:</label>
				<select name="categorieActu" id="categorieActu" onclick='changeValueIdCategorie()'>
				<?php
					foreach ($liste_categories as $value)
					{
						
					echo "<option value='". $value[0] . "'>" . $value[1] . "</option>";
					}
				?>
				</select>
				<input type="button" onclick="apparitionDivModifCat();" value="Modifier" />
				<input type="button" onclick="goPageSuppr();" value="Suprimer" />
			</p>
			<div id="mblock_modifCat">
				
				<p>
					<label for="catModif">Nom:</label>
					<input type="text" name="catModif" id="catModif" />
				</p>
				
				<p>
					<input type="submit" value="Valider" />
				</p>
				
			</div>
		
		</form>
		
		<h2>Nouvelle catégorie</h2>
		<form action="controleur_admin/ajouterCategorie.php" method="post" >
			<?php
				echo "<input type='hidden' name='idProduit' value='" . $idProduit . "' />";
			?>
			
			<p>
				<label for="nom">Nom:</label>
				<input type="text" id="nom" name="nom" />
			</p>
			<input type="submit" value="Ajouter" />
		</form>
		
		<script>
			function goPageSuppr()
			{
				var url ='controleur_admin/supprimerCategorie.php?idCategorie=' +
						document.getElementById('categorieActu').value +
						'&idProduit=' + document.getElementById('idProduit').value;
				document.location= url;
			}
			function changeValueIdCategorie()
			{
				var elmtSelect = document.getElementById('categorieActu');
				document.getElementById("idCategorie").value = elmtSelect.value;
			}
		
			function apparitionDivModifCat()
			{
				document.getElementById("mblock_modifCat").style.display = "block";
				var elmtSelect = document.getElementById('categorieActu');
				document.getElementById("catModif").value = elmtSelect.options[elmtSelect.selectedIndex].text;
			}
			
			
		</script>
	</body>
</html>