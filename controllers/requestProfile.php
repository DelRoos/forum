<?php
    function profilUser($id){
        $req = dbconnect()->prepare("SELECT compte.email, compte.pseudo, utilisateur.* FROM compte, utilisateur WHERE compte.id=:id AND utilisateur.id_utilisateur=:id");
        $req->execute(array('id'=>$id));
        $infoUser = $req->fetch(PDO::FETCH_ASSOC);

        return $infoUser;
    }