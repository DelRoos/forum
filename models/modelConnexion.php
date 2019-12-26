<?php
	

	function authentification($pseudo, $mdp)
	{
		$req = dbconnect()->prepare("SELECT id FROM compte WHERE pseudo=:pseudo AND mdp=:mdp");
		$req->execute(array(
					"pseudo"=>$pseudo,
					"mdp"=>$mdp
				));
		$res = $req->rowcount();
		return $res;
	}

	function connectUser($pseudo, $mdp)
	{
		$req = dbconnect()->prepare("UPDATE compte SET etat=1 WHERE pseudo=:pseudo AND mdp=:mdp");
		$req->execute(array(
					"pseudo"=>$pseudo,
					"mdp"=>$mdp
				));	
	}
?>