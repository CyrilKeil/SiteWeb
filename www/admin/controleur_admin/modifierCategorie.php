<?php
	session_start();
	require_once('../../classes/connect.php');
	require_once('../../classes/categorie.manager.class.php');
	if (!isset($_SESSION['admin']))
	{
		header('Location: ../admin_connexion.php');
	}
	
	if(isset($_POST['idCategorie']) && !empty($_POST['idCategorie'])
		&& isset($_POST['idProduit']) && !empty($_POST['idProduit'])
		&& isset($_POST['catModif']) && !empty($_POST['catModif']))
	{
		$cm = new CategorieManager($bdd);
		$cm->majCategorie($_POST['idCategorie'], $_POST['catModif']);
		$destination = "../index.php";
		if($_POST['idProduit'] !=0)
		{
			$destination = "../modifierFicheProduit.php?id=" . $_POST['idProduit']; 
		}
		
			echo "<p>Modification effectuer <a href='" . $destination . "'>cliquez ici pour continuer</a></p>";
	}
	else
	{
		?>
		 <p><strong>Erreur lors de la modification de la catégorie, le champs du nom est vide</strong></p>
		 <p><a href="../ajouterCategorie.php" >Retour</a></p>
	<?php
	}
	
	
?>