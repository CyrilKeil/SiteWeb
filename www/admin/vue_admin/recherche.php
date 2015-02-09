<?php
	
	$rm = new RechercheManager($bdd);
	$listeIdProduits = $rm->recherche($_POST['recherche']);
	$pm = new ProduitManager($bdd);
	$liste_coeur = $pm->getListeCoupdeCoeurRecherche($listeIdProduits);
	$liste_produit = $pm->getListeProduitRecherche($listeIdProduits);
	
?>

<div id="produits">
	<div class="hotStuff">
		<?php
			foreach ($liste_coeur as $produit)
			{
				?>
				<div class="produit">
					<?php
						echo $produit->getImage();
						echo "<br /><a href='consulterFiche.php?id=" . $produit->getId() . "' >" . $produit->getNom() .  "</a>";
					?>
					<div class='prix_produits'>
						<p><?php echo $produit->getPrix() . '€'; ?></p>
					</div>
				</div>
	<?php	} ?>
	
	</div>
	<div class="produit_classique">
	<?php
		
		foreach ($liste_produit as $produit)
		{
			?>
			<div class="produit">
				<?php
					echo $produit->getImage();
					echo "<br /><a href='consulterFiche.php?id=" . $produit->getId() . "' >" . $produit->getNom() .  "</a>";
				?>
				<div class='prix_produits'>
					<p><?php echo $produit->getPrix() . '€'; ?></p>
				</div>
			</div>
<?php	} ?>
	</div>
</div>