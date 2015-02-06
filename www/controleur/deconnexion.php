<?php
if(isset($_COOKIE["pseudo"]) && !empty($_COOKIE["pseudo"])){
	setcookie("pseudo");
	header('Location: index.php');
}
?>