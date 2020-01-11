<?php 

    function active($item){
        if ($_GET['action']==$item) {
            return 'active';
        }
    }

 ?>

<div class="navbar navbar-default">
    <div class="navbar-header navbar-left">
        <a href="index.php?action=profil" id="pageDeProfil">
            <div id="photoprofile">
                <?php $pro = profilUser($_SESSION['auth']['id']) ?>
                <img src="public/user/profil/<?$rep=($pro['profil']==NULL)?'profilUser.png':$pro['profil']; echo $rep;?>" id="idprofil" class="img-circle" width="100px" height="100px">
                <h2 id="login"><?= ucfirst($_SESSION['auth']['login']); ?></h2>
            </div>
        </a>
    </div>

    <ul class="nav navbar-nav" id="navigation">
        <li><a href="#">Notififation</a></li>
        <li><a href="#">Statut</a></li>
        <li class="<?= active('msg');?>"><a href="index.php?action=msg">Message</a></li>
        <li><a href="#">Groupe</a></li>
    </ul>

    <input type="button" id="deconnect" class="btn btn-primary navbar-right" onclick=window.location.href='index.php?action=deconnexion'; value="Deconnexion" />
</div>