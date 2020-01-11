<?php 
	require 'models/modelConnexion.php';

	function existUser($pseudo, $mdp)
	{
		$req= authentification($pseudo, $mdp);
		$error = "compte n'existe pas";
        $nbre=$req->rowCount();
        $res=$req->fetch();
		if ($nbre != 1) {
			header("location:index.php?action=connexion&erreur=".$error);
		}else{
            $_SESSION['auth'] = array(
                'login' => $pseudo,
                'pass' => $mdp,
                'id'=>$res['id']
            );
			connectUser($pseudo, $mdp);
			header('location:index.php?action=msg');
		}
	}

	function defaultConnect()
	{
		require 'views/connexionView.php';
	}
	


?>