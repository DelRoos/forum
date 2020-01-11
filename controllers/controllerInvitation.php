<?php
    function propositionUser($id)
    {
        $req = dbconnect()->prepare("SELECT id FROM compte WHERE id!=:idUser");
        $req->execute(array("idUser"=>$id));
        return $req;
    }

    function existInvitation($idEnv,$idRec)
    {
        $idEnv = (int) $idEnv;
        $idRec = (int) $idRec;
        $req = dbconnect()->prepare("SELECT id_envoyeur, id_recepteur FROM amitie WHERE id_envoyeur=:idEnv AND id_recepteur=:idRec");
        $req->execute(array("idEnv"=>$idEnv,"idRec"=>$idRec));
        $nbre=$req->rowCount();

        return $nbre;
    }

    function sendInvitation($idEnv,$idRec)
    {
        if (existInvitation($idEnv,$idRec) == 0){
            $req = dbconnect()->prepare("INSERT INTO amitie SET id_envoyeur=:idEnv, id_recepteur=:idRec, decision=0");
            $req->execute(array("idEnv"=>$idEnv,"idRec"=>$idRec));
            $statut = "invitation envoyer";
        }else{
            $statut = "impossible d'envoyer l'invitation";
        }
        header('location:index.php?action=msg&statut='.$statut);
    }

    function selcetInvit($id)
    {
        $req = dbconnect()->prepare('SELECT id_envoyeur FROM amitie WHERE id_recepteur=:id AND decision=0');
        $req->execute(array('id'=>$id));
        return $req;
    }

    function decisionInvit($id_env,$id_rec, $satut)
    {
        if($satut=='acceptUser') {
            $req=dbconnect()->prepare('UPDATE amitie SET decision=1 WHERE id_envoyeur=:id_env AND id_recepteur=:id_rec');
            $req->execute(array(
                'id_env'=>$id_env,
                'id_rec'=>$id_rec
            ));
            header('location:index.php?action=msg');
        } else if($satut=='rejetUser'){
            $req=dbconnect()->prepare('DELETE FROM amitie WHERE id_envoyeur=:id_env AND id_recepteur=:id_rec');
            $req->execute(array(
                'id_env'=>$id_env,
                'id_rec'=>$id_rec
            ));
            header('location:index.php?action=msg');
        }
    }