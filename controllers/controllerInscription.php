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
        }else if(!preg_match($verif1, $email)){
		    $error= "addresse emial non valide";
        }elseif (foundUser($pseudo, $email, $mdp)!=0) {
            $error = "identifiant déjà utilisés";
        }

		return $error;
	}

	function addUser($pseudo, $email, $mdp)
	{
		$errors = erreur($pseudo, $email, $mdp);
			
		if ($errors != "aucune erreur") {
			header("location:index.php?action=inscription&erreur=".$errors);
		}else{
			insertInscription($pseudo, $email, $mdp);
            $req = selectUser($pseudo, $mdp);
            $res = $req->fetch();
            $_SESSION['auth'] = array(
                'login' => $pseudo,
                'pass' => $mdp,
                'id' => $res['id']
            );
            header("location:index.php?action=profil");
		}
	}

	function defaultInscription()
	{
		require 'views/inscriptionView.php';
	}