<?php
	require_once('../../classes/administrateur.manager.class.php');
	require_once('../../classes/connect.php');
	session_start();
	if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])
		&& isset($_POST['mdp']) && !empty($_POST['mdp']))
		{
			$am = new AdministrateurManager($bdd);
			$infosAdmin = $am->getAdmin($_POST['pseudo'], $_POST['mdp']);
			if(array_count_values($infosAdmin) > 0)
			{
				
				$_SESSION['admin'] = $_POST['pseudo'];
				header('Location: ../index.php');
			}
			else
			{
				header('Location: ../admin_connexion.php?erreur=adminInconnu');
			}
		}
?>