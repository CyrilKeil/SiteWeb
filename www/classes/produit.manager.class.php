<?php
	class ProduitManager {
		private $bdd;
		
		public function __construct($bdd) {
			$this->bdd = $bdd;
		}
		
		public function getInfosProduit($id)
		{
			$requete = "SELECT p.id_produit as id, p.nom, p.description, p.prix, c.nom as categorie " .
						"FROM produits p, categorie_produit cp, categories c ".
						"WHERE p.id_produit = cp.id_produit ".
						"AND c.id_categorie = cp.id_categorie ".
						"AND p.id_produit = " . $id;
						
			$resultat = mysqli_query($this->bdd, $requete);
			$return = array();
			if (mysqli_num_rows($resultat) == 1){
				$temp =  mysqli_fetch_assoc($resultat);
				$return['id'] = $temp ['id']; 
				$return['nom'] = $temp ['nom']; 
				$return['prix'] = $temp ['prix']; 
				$return['description'] = $temp ['description']; 
				$return['categorie'] = $temp ['categorie']; 
			}
			
			return $return;
		}
		
		public function isCoupCoeur ($produit)
		{
			$requete = "SELECT id_produit FROM coupdecoeur WHERE id_produit=" . $produit->getId();
			$resultat = mysqli_query($this->bdd, $requete);
			
			return (mysqli_num_rows($resultat) == 1);
		}
		
		public function getListeCoupCoeur ($filtre){
			$requete = "SELECT p.id_produit as id, p.nom, p.description, p.prix, c.nom as categorie " .
						"FROM produits p, categorie_produit cp, categories c ".
						"WHERE p.id_produit = cp.id_produit ".
						"AND c.id_categorie = cp.id_categorie ".
						"AND p.id_produit IN (SELECT id_produit " .
												  "FROM coupdecoeur) " .
						"ORDER BY nom";
						
			if ($filtre > 0)
			{
				$requete = "SELECT p.id_produit as id, p.nom, p.description, p.prix, c.nom as categorie " .
							"FROM produits p, categorie_produit cp, categories c ".
							"WHERE p.id_produit = cp.id_produit ".
							"AND c.id_categorie = cp.id_categorie ".
							"AND cp.id_categorie=" . $filtre . " ".
							"AND p.id_produit IN (SELECT id_produit " .
												  "FROM coupdecoeur) " .
							"ORDER BY nom";
			}
			
			$resultat = mysqli_query($this->bdd, $requete);

			 $liste_produit = array();
			 
			 while ($donnees = mysqli_fetch_assoc($resultat))
			 {
				$liste_produit [] = new Produit($donnees);
			 }
			 
			 return $liste_produit;
		}
		
		public function getListeProduits ($filtre){
			$requete = "SELECT p.id_produit as id, p.nom, p.description, p.prix, c.nom as categorie " .
						"FROM produits p, categorie_produit cp, categories c ".
						"WHERE p.id_produit = cp.id_produit ".
						"AND c.id_categorie = cp.id_categorie ".
						"AND p.id_produit NOT IN (SELECT id_produit " .
												  "FROM coupdecoeur) " .
						"ORDER BY nom";
						
			if ($filtre > 0)
			{
				$requete = "SELECT p.id_produit as id, p.nom, p.description, p.prix, c.nom as categorie " .
							"FROM produits p, categorie_produit cp, categories c ".
							"WHERE p.id_produit = cp.id_produit ".
							"AND c.id_categorie = cp.id_categorie ".
							"AND cp.id_categorie=" . $filtre . " ".
							"AND p.id_produit NOT IN (SELECT id_produit " .
												  "FROM coupdecoeur) " .
							"ORDER BY nom";
			}
			
			$resultat = mysqli_query($this->bdd,$requete);
			 $liste_produit = array();
			 
			 while ($donnees = mysqli_fetch_assoc($resultat))
			 {
				$liste_produit [] = new Produit($donnees);
			 }
			 
			 return $liste_produit;
		}
		
		public function setProduit ($produit)
		{
			$infos = $produit->getInfosProduit;
			$requete = "UPDATE produits " . 
						"SET prix = " . $infos['prix'] . ", description= " . $infos['description'] . ", nom = " . $infos['nom'] . " ".
						"WHERE id_produit = ". $infos['id'];
						
			mysqli_query($this->bdd,$requete);
			
		}
		
		public function createProduit ($produit) 
		{
			$infos = array_slice($produit->getInfosProduit(),1);
			$requete = "INSERT INTO produits(nom,description, prix) ".
						"VALUE(" . $infos['nom'] . ", " . $infos['description'] . ", " . $infos['prix'] . ")";
			
			
			
			mysqli_query($this->bdd,$requete);
		}
	}
?>