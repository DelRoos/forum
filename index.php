<?php

	require 'controllers/controllerInscription.php';
	require 'controllers/controllerConnexion.php';
	require 'controllers/controllerAcceuil.php';
	require 'bdconnexion.php';

	if (isset($_GET['action'])) {
		//page d'inscription
		if ($_GET['action']=='inscription') {
			defaultInscription();
		}elseif($_GET['action']=='addUser' && isset($_POST['valider'])) {
			addUser($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
		}

		//page de connexion
		if ($_GET['action']=='connexion') {
			defaultConnect();
		}elseif($_GET['action']=='connect' && isset($_POST['connexion'])) {
			existUser($_POST['pseudo'], $_POST['mdp']);
		}

			
	}else{
		pageAcceuil();
	}