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
		&& isset($_POST['categorie']) && isset($_POST['coupdeCoeur']))
		{
			$pm = new ProduitManager($bdd);
			$cm = new CategorieManager($bdd);
			$idCategorie = $_POST['categorie'];
			$_POST['categorie'] = $cm->getLibelleCategorie($idCategorie);
			$p = new Produit($_POST);
			$pm->setProduit($p);
			$cm->majCategorieProduit($p,$idCategorie);
			if($pm->isCoupCoeur($p) && $_POST['coupdeCoeur']=="non")
			{
				$pm->enleverCoupdecoeur($p);
			}
			if(!($pm->isCoupCoeur($p)) && $_POST['coupdeCoeur']=="oui")
			{
				$pm->changeEnCoupdeCoeur($p);
			}
			
			if(isset($_FILES['image']))
			{
				if (file_exists(dirname(__FILE__) . '/../../../images/produits/produit'. $p->getId() . '.jpg'))
				{
					if(unlink('../../../images/produits/produit'. $p->getId() . '.jpg'))
					{
					}
					else{
						header('Location: ../modifierFicheProduit.php?erreur=erreurSuppr');
					}
				}
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
						 header('Location: ../modifierFicheProduit.php?erreur=tropgros');
					}
					 if(!move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) 
					 {
						header('Location: ../modifierFicheProduit.php?erreur=pasjpg');
					 }
				 }
				 else{
					header('Location: ../modifierFicheProduit.php?erreur=pasjpg');
				 }
			}
			header("Location: ../listageProduit.php?cat=". $idCategorie );
		}
		else
		{
			if(isset($_POST['id']) && !empty($_POST['id']))
			{
				header('Location: ../modifierFicheProduit.php?erreur=champsManquant&id=' . $_POST['id']);
			}
			else
			{
				header('Location: index.php');
			}
		}
?>