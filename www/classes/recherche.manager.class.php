<?php
	class RechercheManager {
		private $bdd;
		
		public function __construct($bdd)
		{
			$this->bdd = $bdd;
		}
		
		public function rechercheParNom ($recherche)
		{
			$requete = "SELECT id_produit as id ".
						"FROM produits ".
						"WHERE nom LIKE '%" . $recherche . "%'";
			$resultat = mysqli_query($this->bdd, $requete);
			$liste_id_produit = array();
			while($data = mysqli_fetch_assoc($resultat))
			{
				$liste_id_produit[] = $data['id'];
			}
			
			return $liste_id_produit;
		}
		
		public function rechercheParPrix($recherche)
		{
			$requete = "SELECT id_produit as id ".
						"FROM produits ".
						"WHERE prix LIKE '%" . $recherche . "%'";
			$resultat = mysqli_query($this->bdd, $requete);
			$liste_id_produit = array();
			while($data = mysqli_fetch_assoc($resultat))
			{
				$liste_id_produit[] = $data['id'];
			}
			
			return $liste_id_produit;
		}
		
		public function rechercheParCategorie($recherche)
		{
			$requete = "SELECT cp.id_produit as id ".
						"FROM categorie_produit cp, categories c ".
						"WHERE c.nom LIKE '%" . $recherche . "%' ".
						"AND cp.id_categorie = c.id_categorie ";
			$resultat = mysqli_query($this->bdd, $requete);
			$liste_id_produit = array();
			while($data = mysqli_fetch_assoc($resultat))
			{
				$liste_id_produit[] = $data['id'];
			}
			
			return $liste_id_produit;
		}
		
		public function recherche ($chaineDeCaracteres)
		{
			//on transforme la chaine en tableau
			
			foreach ($tableauDemot as $mot)
			{
				
			}
			
		}
	}



?>