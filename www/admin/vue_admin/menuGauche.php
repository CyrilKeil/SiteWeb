<div id="menuGauche">
	<a href="index.php"><p><img src="../../images/home.png" alt="Home" /><br />Accueil</p></a>
	<p class="titre">Nos produits</p>
	<?php
		$cm = new CategorieManager($bdd);
		$liste_categories = $cm->getAllCategories();
		foreach ($liste_categories as $value)
		{
			echo "<p><a href='listageProduit.php?cat=". $value[0] . "' class='boite'>" . $value[1] . "</a></p>";
		}
	?>
</div>