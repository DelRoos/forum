    <?php
	function selectMyFreind($idEnv,$idRec)
    {
        $idEnv = (int) $idEnv;
        $idRec = (int) $idRec;
        $req = dbconnect()->prepare("SELECT id_envoyeur, id_recepteur FROM amitie WHERE id_envoyeur=:idEnv AND id_recepteur=:idRec");
        $req->execute(array("idEnv"=>$idEnv,"idRec"=>$idRec));
        $nbre=$req->rowCount();

        return $nbre;
    }

	function recupMsg()
    {
    	return "aucune conversation";
    }


    function insertMsg($idEnv, $idRec, $contenu)
    {
    	$idEnv = (int) $idEnv;
        $idRec = (int) $idRec;
        $contenu = htmlspecialchars($contenu);

    	$req = dbconnect()->prepare("INSERT INTO msg_prive SET id_envoyeur=:idenv, id_recepteur=:idrec, date_envoi=NOW(), date_reception=0, contenu=:contenu, etat=0");
    	$req->execute(array(
    							'idenv'=>$idEnv,
    							'idrec'=>$idRec,
    							'contenu'=>$contenu
    						));
    }

    function selectMsg($myId, $freindId)
    {
    	$req = dbconnect()->prepare("SELECT id_envoyeur, id_recepteur, date_envoi, date_reception, contenu FROM msg_prive WHERE (id_recepteur=:myid AND id_envoyeur=:freindid) OR (id_recepteur=:freindid AND id_envoyeur=:myid)");
    	$req->execute(array(
    					'myid'=>$myId,
    					'freindid'=>$freindId
    				));
    	return $req;
    }

    function selectFreindMsg($myId){
    	$req = dbconnect()->prepare("SELECT id_recepteur AS id_user FROM msg_prive WHERE id_recepteur=:myid OR id_envoyeur=:myid GROUP BY id_envoyeur,id_recepteur");

    	$req->execute(array('myid'=>$myId));

    	return $req;
    }

    function selectEndMsg($myId, $myIdFreind){
    	$req = dbconnect()->prepare("SELECT contenu FROM msg_prive WHERE ((id_envoyeur=:freindId AND id_recepteur=:myid) OR (id_envoyeur=:myid AND id_recepteur=:freindId)) ORDER BY id_msg DESC");
    
    	$req->execute(array(
    					'myid'=>$myId,
    					'freindId'=>$myIdFreind
    				));

    	return $req;
    }