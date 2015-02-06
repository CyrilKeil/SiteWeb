<?php
	session_start();
	require_once('../../classes/connect.php');
	require_once('../../classes/categorie.manager.class.php');
	if (!isset($_SESSION['admin']))
	{
		header('Location: ../admin_connexion.php');
	}
	
	if(isset($_GET['idCategorie']) && isset($_GET['idProduit']))
	{
		$cm = new CategorieManager($bdd);
		$cm->supprCategorie($_GET['idCategorie']);
		$destination = "../index.php";
		if($_GET['idProduit'] != 0)
		{
			$destination = "../modifierFicheProduit.php?id=" . $_GET['idProduit']; 
		}
		
			echo "<p>Suppression effectuer <a href='" . $destination . "'>cliquez ici pour continuer</a></p>";
	}
	else
	{
		?>
		 <p><strong>Erreur lors de la suppression de la catégorie</strong></p>
		 <p><a href="../ajouterCategorie.php" >Retour</a></p>
	<?php
	}
	
	
?>