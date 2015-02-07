<?php
	class AdministrateurManager
	{
		private $bdd;
		
		public function __construct($bdd) {
			$this->bdd = $bdd;
		}
		
		public function getAdmin($login, $mdp)
		{
			$requete = "SELECT id, login, motdepasse ".
						"FROM administrateurs ".
						"WHERE login= '". $login . "'".
						" AND motdepasse='" . $mdp . "'";
			echo $requete . '<br />';
			$resultat = mysqli_query($this->bdd, $requete);
			$return = array();
			if (mysqli_num_rows($resultat) == 1){
				$return =  mysqli_fetch_assoc($resultat);
			}
			
			return $return;
		}
		
		public function verifAdminExiste($login)
		{
			$requete = "SELECT id FROM administrateurs WHERE login=" . $login;
			$resultat = mysqli_query($this->bdd, $requete);
			
			return (mysqli_num_rows($resultat) == 1);	
		}
		
		public function majMdp($id, $newMdp)
		{
			$requete = "UPDATE administrateurs SET motdepasse=" . $newMdp . " WHERE id=" . $id;
			mysqli_query($this->bdd, $requete);
		}
		
		public function creerAdmin($login, $mdp)
		{
			$requete = "INSERT INTO administrateurs(login, motdepasse) ".
						"VALUES(" . $login . ", " . $mdp . ")";
						
			mysqli_query($this->bdd, $requete);
		}
	}

?>