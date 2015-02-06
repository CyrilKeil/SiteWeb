<?php

class Action {
	public static function lancerAction ($action, $params) 
	{
		if (method_exists(get_class() , $action))
		{
		  // On appelle le setter.
		  self::$action($params);
		}
	}
	
	public static function nouveauClient($params)
	{
		$clientManager = new Client_Manager($GLOBALS['bdd']);	
		$c = new Client(array(
								"num" => 1, 
								"pseudo" => "testInsertLogin", 
								"nom" => "testInsertNom",
								"prenom" => "testInsertPrenom",
								"email" => "testInsertEmail",
								"adresse" => "testInsertAdresse"));
		$clientManager->createClient($c,"testInsertMDP");
	}
}

?>