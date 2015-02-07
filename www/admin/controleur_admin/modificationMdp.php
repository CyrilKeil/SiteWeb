<?php
	require_once('../../classes/administrateur.manager.class.php');
	require_once('../../classes/connect.php');
	session_start();
	if(isset($_POST['newmdp']) && !empty($_POST['newmdp'])
		&& isset($_POST['actumdp']) && !empty($_POST['actumdp'])
		&& isset($_POST['confirm_mdp']) && !empty($_POST['confirm_mdp']))
		{
			$am = new AdministrateurManager($bdd);
			$infosAdmin = $am->getAdmin($_SESSION['admin'], $_POST['actumdp']);
			if(array_count_values($infosAdmin) > 0)
			{
				$am->majMdp($infosAdmin['id'], $_POST['newmdp']);
				header('Location: ../index.php');
			}
			else
			{
				header('Location: ../admin_connexion.php?erreur=adminInconnu');
			}
		}
?>