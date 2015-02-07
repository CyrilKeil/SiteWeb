<?php
	session_start();
	require_once('../../classes/connect.php');
	require_once('../../classes/categorie.manager.class.php');
	if (!isset($_SESSION['admin']))
	{
		header('Location: ../admin_connexion.php');
	}
	
	if(isset($_POST['nom']) && !empty($_POST['nom'])
		&& isset($_POST['idProduit']))
	{
		$cm = new CategorieManager($bdd);
		$cm->addCategorie($_POST['nom']);
		$destination = "../index.php";
		if($_POST['idProduit'] !=0)
		{
			$destination = "../modifierFicheProduit.php?id=" . $_POST['idProduit']; 
		}
		
			echo "<p>Ajout effectuer <a href='" . $destination . "'>cliquez ici pour continuer</a></p>";
	}
	else
	{
		?>
		 <p><strong>Erreur lors de l'ajout de la catégorie, le champs du nom est vide</strong></p>
		 <p><a href="../ajouterCategorie.php" >Retour</a></p>
	<?php
	}
	
	
?>