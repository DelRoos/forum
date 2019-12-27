<?php
	function deconnectUser($pseudo, $mdp)
	{
		$req = dbconnect()->prepare("UPDATE compte SET etat=0 WHERE pseudo=:pseudo AND mdp=:mdp");
		$res = $req->execute(array(
					"pseudo"=>$pseudo,
					"mdp"=>$mdp
				));	

		session_destroy();
		header("location:index.php?action=connexion");
	}