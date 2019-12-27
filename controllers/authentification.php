<?php
    require 'models/modelAuth.php';

    function islogged()
    {
        if(isset($_SESSION['auth']) && isset($_SESSION['auth']['login']) && isset($_SESSION['auth']['pass'])){
            extract($_SESSION['auth']);
            $nbr=auth($login, $pass);
            if($nbr!=1) {
                header('location:index.php?action=connexion');
            }
        }else{
            header('location:index.php?action=connexion');
        }
    }