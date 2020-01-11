<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Invitation</div>
        <div class="panel-body">
            <table>
                <?php
                $res=selcetInvit($_SESSION['auth']['id']);
                while($idForUser = $res->fetch()){
                    $profilForUser = profilUser($idForUser['id_envoyeur']);
                        ?>
                        <div id="userProfil" style="height: 20px; padding-top:0px; margin-top:0; " >
                            <a style="padding-bottom: 5px;"><img class="img-circle" width="40px" height="40px" src="public/user/profil/<?$rep=($profilForUser['profil']==NULL)?'profilUser.png':$profilForUser['profil']; echo $rep;?>">
                            <?= ucfirst($profilForUser['pseudo']);?></a>
                            <input type="button" class="btn btn-danger btn-xs pull-right" onclick=window.location.href='index.php?action=decision&statut=rejetUser&id_rec=<?= $idForUser['id_envoyeur'];?>'; value="rejetter" style="margin-left: 10px;"/>
                            <input type="button" class="btn btn-success btn-xs pull-right" onclick=window.location.href='index.php?action=decision&statut=acceptUser&id_rec=<?= $idForUser['id_envoyeur'];?>'; value="accepter" />

                        </div>
                        <hr>
                        <?php
                }
                ?>
                <a href="" class="pull-right">voir plus</a>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Connaissez-vous ?</div>
        <div class="panel-body">
            <table>
                    <?php
                        $res=propositionUser($_SESSION['auth']['id']);
                        while($idForUser = $res->fetch()){
                            $profilForUser = profilUser($idForUser['id']);
                            if (existInvitation($_SESSION['auth']['id'], $idForUser['id'])==0 && existInvitation($idForUser['id'], $_SESSION['auth']['id'])==0){
                    ?>
                            <tr id="userProfil">
                                    <img class="img-circle" width="40px" height="40px" src="public/user/profil/<?$rep=($profilForUser['profil']==NULL)?'profilUser.png':$profilForUser['profil']; echo $rep;?>">
                                    <?= ucfirst($profilForUser['pseudo']);?>
                                    <input type="button" class="btn btn-info pull-right btn-xs" onclick=window.location.href='index.php?action=inviteUser&id_rec=<?= $idForUser['id'];?>'; value="Inviter" />
                            </tr>
                            <hr>
                    <?php
                            }
                        }
                    ?>
                    <a href="" class="pull-right">voir plus</a>
            </table>
        </div>
    </div>
</div>