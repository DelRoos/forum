<?php
	//parametre de connexion
	define("ADRESSE", "localhost");
	define("BASE_NOM", "forum");
	define("LOGIN", "root");
	define("PASSWORD", "");

	function dbconnect()
	{
		//connexion a la base de donne
		try
		{
			$connexion = new pdo('mysql:host='.ADRESSE.';dbname='.BASE_NOM.';charset = utf8',LOGIN, PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}

		return $connexion;
	}

?>