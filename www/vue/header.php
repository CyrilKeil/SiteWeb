<!-- Récupération contenu cookies -->
<?php
$pseudo = "";
	if(isset($_COOKIE["pseudo"]) && !empty($_COOKIE["pseudo"])){
		$pseudo = $_COOKIE["pseudo"];
	}
?>


<div id="header">
	<img src="../images/banniere.jpg" alt="banniere"/>
	<div class="nav">
		<ul><form action="#" method="POST">
			<li><img src="../images/search.png" alt="search" name="search"/></li>
			<li><label for="recherche">Rechercher</label></li>
			<li><input type="text" name="recherche" id="recherche" size="50"/></li>
			<li><input type="submit" value="Rechercher" /></li>
			<?php
			
				if($pseudo != ""){
					$page = "controleur/deconnexion.php";
					?>
					<li class="btnDeconnexion">Bienvenue <?php echo $pseudo ?> <input type='button' onclick="document.location.href='<?php echo $page ?>';" value='Deconnexion' /></li>
					<?php
				}
				else{
					$page = "connexion.php";
					?>
					<li class="btnConnexion"><input type ="button" class="button" onclick = "document.location.href='<?php echo $page ?>';" value="Connexion" /></li>
					<?php
				}
			?>
			</form>
		</ul>
	</div>
</div>