<?php
	require_once("../../classes/produit.manager.class.php");
	require_once("../../classes/categorie.manager.class.php");
	require_once("../../classes/produit.class.php");
	require_once("../../classes/connect.php");	
	if(isset($_POST['idProduit']) && !empty($_POST['idProduit']))
	{
		$pm = new ProduitManager($bdd);
		$cm = new CategorieManager($bdd);
		$p = new Produit($pm->getInfosProduit($_POST['idProduit']));
		$cat = $cm->getLibelleCategorieProduit($p);
		echo $cat . '<br />';
		if(!empty($cat)) {
			$p->setCategorie($cat);
			$cm->suppressionCategorieProduit($p);
		}
		
		if($pm->isCoupCoeur($p))
		{
			$pm->enleverCoupdecoeur($p);
		}
		
		if (file_exists(dirname(__FILE__) . '/../../../images/produits/produit'. $p->getId() . '.jpg'))
		{
			if(unlink('../../../images/produits/produit'. $p->getId() . '.jpg'))
			{
			}
			else{
				header('Location: ../modifierFicheProduit.php?erreur=erreurSuppr');
			}
		}
		
		$pm->supprimerProduit($p);
		//header('Location: ../index.php');
	}
	
?>