<?php
    function update($id, $nom, $prenom, $sexe, $date, $profil, $lieux)
    {
        $db=dbconnect();
        $verif=$db->prepare("SELECT id_utilisateur FROM utilisateur WHERE id_utilisateur=:id");
        $verif->execute(array('id'=>$id));
        $n=$verif->rowCount();
        if($n>0){
            $req=$db->prepare("UPDATE utilisateur SET nom=:nom, prenom=:prenom, sexe=:sexe, date_naiss=:dat, lieux=:lieux WHERE id_utilisateur=:id");
            $req->execute(array(
                'nom'=>$nom,
                'prenom'=>$prenom,
                'sexe'=> $sexe,
                'dat'=>$date,
                'lieux'=>$lieux,
                'id'=>$id
            ));
            if(!empty($profil)){
                $req=$db->prepare("UPDATE utilisateur SET profil=:profil WHERE id_utilisateur=:id");
                $req->execute(array(
                    'profil'=>$id.'.'.$profil,
                    'id'=>$id
                ));
            }

        }else{
            $profil=$id.'.'.$profil;
            if(empty($profil)) {
                $profil = NULL;
            }
            $req= $db ->prepare("INSERT INTO utilisateur(id_utilisateur, nom, prenom, sexe, date_naiss,profil ,lieux) VALUES (:id, :nom, :prenom, :sexe, :dat, :profil, :lieux)");
            $req->execute(array(
                'id'=>$id,
                'nom'=>$nom,
                'prenom'=>$prenom,
                'sexe'=> $sexe,
                'dat'=> $date,
                'profil' => $profil,
                'lieux'=>$lieux
            ));

        }
    }
?>