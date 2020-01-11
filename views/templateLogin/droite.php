<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Discussion instantane</div>
        <div class="panel-body">
            liste personne connecte
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Amis</div>
        <div class="panel-body">
            <table>
                <?php
                    $res=selcetFreind($_SESSION['auth']['id']);
                    while($idForUser = $res->fetch()){
                        if($_SESSION['auth']['id'] == $idForUser['id_envoyeur']){
                            $idFreind = $idForUser['id_recepteur'];
                            $profilForUser = profilUser($idForUser['id_recepteur']);
                        }elseif ($_SESSION['auth']['id'] == $idForUser['id_recepteur']){
                            $profilForUser = profilUser($idForUser['id_envoyeur']);
                            $idFreind = $idForUser['id_envoyeur'];
                        }
                ?>
                    <div id="userProfil" style="height: 20px; padding-top:0px; margin-top:0; " >
                        <a style="padding-bottom: 5px;" href="index.php?action=msg&id_freind=<?= $idFreind;?>">
                            <img class="img-circle" width="40px" height="40px" src="public/user/profil/<?$rep=($profilForUser['profil']==NULL)?'profilUser.png':$profilForUser['profil']; echo $rep;?>">
                            <?= ucfirst($profilForUser['pseudo']);?>
                        </a>
                    </div>
                    <hr>
                <?php

                    }
                ?>
                <a href="" class="pull-right">voir plus</a>
            </table>
        </div>
    </div>
</div>