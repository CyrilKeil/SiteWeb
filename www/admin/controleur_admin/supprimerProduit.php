<?php
	require_once("../../classes/produit.manager.class.php");
	require_once("../../classes/connect.php");
		
	if(isset($_POST['idProduit']))
	{
		$pm = new ProduitManager($bdd);
		$cm = new CategorieManager($bdd);
		$p = new Produit($pm->getInfosProduit($_POST['idProduit']));
		$cat = $cm->getLibelleCategorieProduit($p);
		
		if(!empty($cat)) {
			$p->setCategorie($cat);
			$cm->suppressionCategorieProduit($p);
		}
		
		if($pm->isCoupCoeur($p))
		{
			$pm->enleverCoupdecoeur($p);
		}
		
		$pm->supprimerProduit($p);
		header('Location: index.php');
	}
	
?>