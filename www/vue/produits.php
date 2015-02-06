<div id="produits">
	<!-- A faire plus tard si temps dispo <div class="filAriane"></div> -->
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
		$liste_produit = $pm->getListeProduits($filtre);
		
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