<?php
	require_once('init_admin.php');

	if (!isset($_SESSION['admin']))
	{
		header('Location: admin_connexion.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Page d'administration</title>
		<link rel="stylesheet" href="../../style/style.css">
		 <link rel="stylesheet" href="../../style/style_admin.css">
	</head>
	<body>
		<?php
			require_once("vue_admin/header.php");
			require_once("vue_admin/menuGauche.php");
		?>
		<div id="produits">
			<div class="hotStuff">
				<?php
					$pm = new ProduitManager($bdd);
					$filtre = 0;
					if(isset($_GET['cat']))
					{
						$filtre = $_GET['cat'];
					}
					$liste_coeur = $pm->getListeCoupCoeur($filtre);
					
					foreach ($liste_coeur as $produit)
					{
						?>
						<div class="produit">
							<?php
								echo $produit->getImage("../");
								echo "<br /><a href='modifierFicheProduit.php?id=" . $produit->getId() . "' >" . $produit->getNom() .  "</a>";
							?>
							<div class='prix_produits'>
								<p><?php echo $produit->getPrix() . '€'; ?></p>
							</div>
						</div>
			<?php	} ?>
			
			</div>
			<div class="produit_classique">
					<?php
				$liste_produit = $pm->getListeProduits($filtre);
				
				foreach ($liste_produit as $produit)
				{
					?>
					<div class="produit">
						<?php
							echo $produit->getImage("../");
							echo "<br /><a href='modifierFicheProduit.php?id=" . $produit->getId() . "' >" . $produit->getNom() .  "</a>";
						?>
						<div class='prix_produits'>
							<p><?php echo $produit->getPrix() . '€'; ?></p>
						</div>
					</div>
		<?php	} ?>
			</div>
		</div>
	</body>
</html>