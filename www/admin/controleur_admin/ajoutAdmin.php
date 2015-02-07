<?php
	require_once('../../classes/administrateur.manager.class.php');
	require_once('../../classes/connect.php');
	
	if(isset($_POST['login']) && !empty($_POST['login'])
		&& isset($_POST['mdp']) && !empty($_POST['mdp'])
		&& isset($_POST['confirm_mdp']) && !empty($_POST['confirm_mdp'])
		&& ($_POST['confirm_mdp'] == $_POST['mdp']))
		{
			$adminManager = new AdministrateurManager($bdd);
			$adminManager->creerAdmin($_POST['login'], $_POST['mdp']);
			header('Location: index.php');
		}
		else
		{
			header('Location: ../ajoutAdmin.php?erreur=champsManquant');
		}
?>