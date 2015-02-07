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
	if (isset($_GET['id']) && !empty($_GET['id']))
	{
		$pm = new ProduitManager($bdd);
		$p = new Produit($pm->getInfosProduit($_GET['id']));
		?>
		<div class="fiche_porduit">
			<h1> <?php echo $p->getNom(); ?> </h1>
			<p><?php echo $p->getImage(); ?> </p>
			<p><?php echo $p->getDescription(); ?></p>
			<p><?php echo $p->getPrix() . '€'; ?></p>
		</div>
		<?php
	}
  ?>
  </body>
</html>