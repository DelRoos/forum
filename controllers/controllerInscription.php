<?php

	require('models/modelInscription.php');

	function erreur($pseudo, $email, $mdp)
	{
		
		$pseudo = htmlspecialchars($pseudo);
		$email = htmlspecialchars($email);
		$mdp = htmlspecialchars($mdp);
		$pass='/[0-9a-z]{8,}/';
        $verif1='/^[a-zA-Z0-9]/';
        $verif2='/@{1}/';
        $verif3='/[gmail]{1}[.com]{1}$/';

		$error = "aucune erreur";

		if(empty($pseudo) || empty($email) || empty($mdp)){
			$error = "Veillez remplir tous les champs";
		}else if(!preg_match($pass, $mdp)){
            $error = "mot de passe incorrect";
        }else if(!preg_match($verif1, $email) || !preg_match($verif2, $email) || !preg_match($verif3, $email)){
		    $error= "addresse emial incorect";
        }elseif (foundUser($pseudo, $email, $mdp)!=0) {
            $error = "identifiant deja utilise";
        }

		return $error;
	}

	function addUser($pseudo, $email, $mdp)
	{
		$errors = erreur($pseudo, $email, $mdp);
			
		if ($errors != "aucune erreur") {
			header("location:index.php?action=inscription&erreur=".$errors);
		}else{
            $_SESSION['auth'] = array(
                'login' => $pseudo,
                'pass' => $mdp
            );
			insertInscription($pseudo, $email, $mdp);
            header("location:index.php?action=profil");
		}
	}

	function defaultInscription()
	{
		require 'views/inscriptionView.php';
	}