<?php

	require('models/modelInscription.php');

	function erreur($pseudo, $email, $mdp)
	{
		
		$pseudo = htmlspecialchars($pseudo);
		$email = htmlspecialchars($email);
		$mdp = htmlspecialchars($mdp);

		$error = "aucune erreur";

		if(empty($pseudo) || empty($email) || empty($mdp)){
			$error = "Veillez remplir tous les champs";
		}elseif (foundUser($pseudo, $email, $mdp)!=0) {
			$error = "identifiant deja utilise";
		}

		return $error;
	}

	function addUser($pseudo, $email, $mdp)
	{
		$errors = erreur($pseudo, $email, $mdp);
			
		if ($errors == "aucune erreur") {
			header("location:index.php?action=inscription&erreur=".$errors);
		}else{
			insertInscription($pseudo, $email, $mdp);
		}
	}

	function defaultInscription()
	{
		require 'views/inscriptionView.php';
	}