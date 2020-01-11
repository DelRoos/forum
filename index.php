<?php
    session_start();
	require 'controllers/controllerInscription.php';
    require 'controllers/controllerAmis.php';
    require 'controllers/requestProfile.php';
	require 'controllers/controllerConnexion.php';
	require 'controllers/controllerAcceuil.php';
    require 'controllers/controllerMessage.php';
	require 'bdconnexion.php';
	require 'controllers/controllerProfil.php';
    require 'controllers/authentification.php';
    require 'controllers/controllerDeconnect.php';
    require 'controllers/controllerInvitation.php';

	if (isset($_GET['action'])) {
		//page d'inscription
		if ($_GET['action']=='inscription') {
			defaultInscription();
		}elseif($_GET['action']=='addUser' && isset($_POST['valider'])) {
			addUser($_POST['pseudo'], $_POST['email'], $_POST['mdp']);
		}

        //page de profil
        if($_GET['action']=='profil'){
            islogged();
            if(isset($_POST['update'])){
                UpdateUser();
            }else {
                profildefaut();
            }
        }

        //message
        if($_GET['action']=='msg'){
            islogged();
            if (isset($_GET['id_freind']) && !empty((int) $_GET['id_freind'])) {
            	baseMsg($_SESSION['auth']['id'],$_GET['id_freind']);
            }else{
                defaultMsg($_SESSION['auth']['id']);
            }
        }
        
        if($_GET['action']=='sendmsg'){
            islogged();
			sendMsg($_SESSION['auth']['id'], $_POST['id_freind'], $_POST['message']);
        }

        //deconnexion
        if($_GET['action']=='deconnexion'){
            islogged();
            extract($_SESSION['auth']);
            deconnectUser($login, $pass);
        }

        //invitaton
        if($_GET['action']=='inviteUser')
        {
            islogged();
            sendInvitation($_SESSION['auth']['id'], $_GET['id_rec']);
        }

        //validation ou refus des invitations
        if($_GET['action']=='decision')
        {
            islogged();
            decisionInvit($_GET['id_rec'], $_SESSION['auth']['id'], $_GET['statut']);
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