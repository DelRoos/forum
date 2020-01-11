<?php
    function selcetFreind($id)
    {
        $req = dbconnect()->prepare('SELECT id_envoyeur , id_recepteur  FROM amitie WHERE (id_recepteur=:id OR id_envoyeur=:id) AND decision=1');
        $req->execute(array('id'=>$id));
        return $req;
    }
