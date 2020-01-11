<?php
    function auth($login, $pass)
    {
        $db=dbconnect();

        //authentification de l'utiliateur
        $req = $db -> prepare("SELECT id FROM compte WHERE pseudo=:pseudo AND mdp=:pass AND etat=1");
        $req->execute(array(
            'pseudo'=>$login,
            'pass'=>$pass
        ));
        $n=$req->rowCount();
        return $n;
    }
    ?>
