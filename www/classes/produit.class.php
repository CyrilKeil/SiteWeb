<?php
	class Produit {
		private $id;
		private $nom;
		private $description;
		private $prix;
		private $categorie;
		
		public function __construct($data) {
			$this->hydrate($data);
		}
		
		public function setPrix ($prix)
		{
			$this->prix = $prix;
		}
		
		public function setNom ($nom)
		{
			$this->nom = $nom;
		}
		
		public function setCategorie ($categorie)
		{
			$this->categorie = $categorie;
		}
		
		public function setDescription ($description)
		{
			$this->description = $description;
		}
		
		public function setId ($id) {
			$this->id = $id;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function getNom(){
			return $this->nom;
		}
		
		public function getDescription(){
			return $this->description;
		}
		
		public function getPrix(){
			return $this->prix;
		}
		
		public function getCategorie(){
			return $this->categorie;
		}
		
		public function getInfosProduit()
		{
			
			return array("id" => $this->id,
						 "prix" => $this->prix,
						 "nom" => $this->nom,
						 "description" => $this->description,
						 "categorie" => $this->categorie);
		}
		
		public function getImage($inAdminRepertory = "")
		{
			$return = "<img src='". $inAdminRepertory . "../images/photo_indisponible.jpg' alt='photo indisponible' /> ";
			
			if (file_exists(dirname(__FILE__) . '/../../images/produits/produit'. $this->id . '.jpg'))
			{
				$return = "<img src='". $inAdminRepertory . "../images/produits/produit" . $this->id .".jpg' alt='photo du produit' /> ";
			}
			return $return;
		}
		
		private function hydrate(array $donnees)
		{
			foreach ($donnees as $key => $value)
			{
				// On récupère le nom du setter correspondant à l'attribut.
				$method = 'set'.ucfirst($key);
					
				// Si le setter correspondant existe.
				if (method_exists($this, $method))
				{
				  // On appelle le setter.
				  $this->$method($value);
				}
			}
		}
	}

?>