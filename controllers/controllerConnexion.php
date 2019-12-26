<?php 
	require 'models/modelConnexion.php';

	function existUser($pseudo, $mdp)
	{
		$nbre = authentification($pseudo, $mdp);
		$error = "compte n'existe pas";

		if ($nbre != 1) {
			header("location:index.php?action=connexion&erreur=".$error);
		}else{
			connectUser($pseudo, $mdp);
			header("location:index.php?action=message");
		}
	}

	function defaultConnect()
	{
		require 'views/connexionView.php';
	}
	


?>