<?php include('init.php'); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>WorldWideFood</title>
    <link rel="stylesheet" href="../style/style.css">
    <script src="script.js"></script>
  </head>
  <body>
  <!-- page content -->
  <?php
  	include("vue/header.php");
	include("vue/menuGauche.php");
	if(isset($_POST['recherche']) && !empty($_POST['recherche']))
	{
		include('vue/recherche.php');
	}
	else{
		include("vue/produits.php");
	}
  ?>
  </body>
</html>