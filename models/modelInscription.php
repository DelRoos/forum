<?php

	function insertInscription($pseudo, $email, $mdp)
	{
		$req = dbconnect()->prepare("INSERT INTO compte SET pseudo=:pseudo, email=:email, mdp=:mdp, etat=1, date_creation=NOW()");
		$res = $req->execute(array(
					"pseudo"=>$pseudo,
					"email"=>$email,
					"mdp"=>$mdp
				));
		return $res;
	}

	function foundUser($pseudo, $email, $mdp)
	{
		$req = dbconnect()->prepare("SELECT id FROM compte WHERE pseudo=:pseudo OR email=:email OR mdp=:mdp");
		$req->execute(array(
					"pseudo"=>$pseudo,
					"email"=>$email,
					"mdp"=>$mdp
				));
		$nbr=$req->rowCount();
		return $nbr;
	}
?>