<?php
	require_once("../../classes/produit.manager.class.php");
	require_once("../../classes/categorie.manager.class.php");
	require_once("../../classes/produit.class.php");
	require_once("../../classes/connect.php");
	
	if(isset($_POST['nom']) && !empty($_POST['nom'])
		&& isset($_POST['id']) && !empty($_POST['id'])
		&& isset($_POST['prix']) && !empty($_POST['prix'])
		&& isset($_POST['description']) && !empty($_POST['description'])
		&& preg_match('#[0-9]+,?[0-9]{0,2}#', $_POST['prix'])
		&& isset($_POST['categorie']))
		{
			$pm = new ProduitManager($bdd);
			$cm = new CategorieManager($bdd);
			$idCategorie = $_POST['categorie'];
			$_POST['categorie'] = $cm->getLibelleCategorie($idCategorie);
			$p = new Produit($_POST);
			$pm->setProduit($p);
			$cm->majCategorieProduit($p,$idCategorie);
		}
		else
		{
			header('Location ../modifierFicheProduit.php?erreur=champsManquant');
		}
?>