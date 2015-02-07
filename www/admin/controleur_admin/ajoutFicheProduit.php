<?php
require_once("../../classes/produit.manager.class.php");
	require_once("../../classes/categorie.manager.class.php");
	require_once("../../classes/produit.class.php");
	require_once("../../classes/connect.php");
	if(isset($_POST['nom']) && !empty($_POST['nom'])
		&& isset($_POST['prix']) && !empty($_POST['prix'])
		&& isset($_POST['description']) && !empty($_POST['description'])
		&& preg_match('#[0-9]+,?[0-9]{0,2}#', $_POST['prix'])
		&& isset($_POST['categorie']) && isset($_POST['coupdeCoeur']))
		{
			
			$pm = new ProduitManager($bdd);
			$cm = new CategorieManager($bdd);
			
			$idCategorie = $_POST['categorie'];
			$_POST['categorie'] = $cm->getLibelleCategorie($idCategorie);
			$p = new Produit($_POST);
			
			$pm->createProduit($p);
			
			$id = $pm->getId($p);
			if($id == 0)
			{
				
				header('Location: ../index.php');
			}
			$p->setId($id);
			
			if($_POST['coupdeCoeur']=="oui")
			{
				$pm->changeEnCoupdeCoeur($p);
			}
			$cm->addCategorieProduit($p, $idCategorie);
			
			if(isset($_FILES['image']))
			{
				 $dossier = '../../../images/produits/';
				 $fichier = 'produit' . $p->getId() . '.jpg';

				 $extension = strrchr($_FILES['image']['name'], '.');
				 if($extension == '.jpg') {
					// taille maximum (en octets)
					$taille_maxi = 100000;
					//Taille du fichier
					$taille = filesize($_FILES['image']['tmp_name']);
					if($taille>$taille_maxi)
					{
						 header('Location: ../ajoutProduit.php?erreur=tropgros');
					}
					 if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) 
					 {
						header("Location: ../listageProduit.php?cat=". $idCategorie );
						
					 }
					 else{
						header('Location: ../ajoutProduit.php?erreur=pasjpg');
					 }
				 }
				 else{
					header('Location: ../ajoutProduit.php?erreur=pasjpg');
				 }
			}

			header("Location: ../listageProduit.php?cat=". $idCategorie );
		}
		else
		{
			header('Location: ../ajoutProduit.php?erreur=champsManquant');
		}
		
		
		
?>