<?php
	class CategorieManager {
		private $bdd;
		
		public function __construct($bdd) {
			$this->bdd = $bdd;
		}
		
		public function getAllCategories()
		{
			$requete = "SELECT id_categorie as id, nom " .
						"FROM categories ";
			
			$resultat = mysqli_query($this->bdd, $requete) or die("erreur");
			$donnees = mysqli_fetch_all($resultat);

			 return $donnees;
			
		}
		
		public function getIdCategorie ($libelle)
		{
			$requete = "SELECT id_categorie as id FROM categories WHERE nom=" . $libelle;
			$resultat = mysqli_query($this->bdd, $requete);
			
			$id = null;
			if (mysqli_num_rows($resultat) == 1){
				$temp =  mysqli_fetch_assoc($resultat);
				$id = $temp['id'];
			}
			
			return $id;
		}
		
		public function getLibelleCategorie ($id)
		{
			$requete ="SELECT nom FROM categories WHERE id_categorie=".$id;
			$resultat = mysqli_query($this->bdd, $requete);
			
			$nom = null;
			if (mysqli_num_rows($resultat) == 1){
				$temp =  mysqli_fetch_assoc($resultat);
				$nom = $temp['nom'];
			}
			return $nom;
		}
		
		/* public function getCategorieProduit($idProduit)
		{
			$requete = "SELECT c.id_categorie as id, c.nom ".
						"FROM categories c, categorie_produit cp ".
						"WHERE c.id_categorie = cp.id_categorie ".
						"AND cp.id_produit= ". $idProduit;
			$resultat = mysqli_query($this->bdd, $requete);
			$return = array();
			if (mysqli_num_rows($resultat) == 1){
				$temp =  mysqli_fetch_assoc($resultat);
				$return['id'] = $temp ['id']; 
				$return['nom'] = $temp ['nom']; 
			}
			
			return $return;
		}
		*/
		
		public function supprCategorie($idCategorie)
		{
			$requete = "DELETE FROM categories WHERE id_categorie=" . $idCategorie;
			mysqli_query($this->bdd, $requete);
		}
		
		public function majCategorie ($idCategorie, $newLibelle)
		{
			$requete = "UPDATE categories SET nom = '" . $newLibelle .
						"' WHERE id_categorie=" .$idCategorie;
			mysqli_query($this->bdd, $requete);
		}
		
		public function addCategorie ($libelle)
		{
			$requete = "INSERT INTO categories (nom) VALUE('" . $libelle . "')";
			mysqli_query($this->bdd, $requete);
		}
		
		public function majCategorieProduit ($produit, $idCategorie)
		{
			$requete = "UPDATE categorie_produit SET id_produit=" . $produit->getId() .
						" WHERE id_categorie=" . $idCategorie;
			mysqli_query($this->bdd, $requete);
		}
		
		public function addCategorieProduit($produit, $idCategorie)
		{
			$requete = "INSERT INTO categorie_produit (id_categorie, id_produit) ".
						"VALUES(" . $idCategorie . ", " . $produit->getId() . " )";
			
			mysqli_query($this->bdd, $requete);
		}
	}

?>