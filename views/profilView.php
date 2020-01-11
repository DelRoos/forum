<?php ob_start(); ?>
<?php $title = "mon profil"; ?>
<?php $pro=profilUser($_SESSION['auth']['id']) ?>
<div class="container">
    <div class="row">
        <?php require 'templateLogin/Entete.php';?>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <img src="public/user/profil/<?$rep=($pro['profil']==NULL)?'profilUser.png':$pro['profil']; echo $rep;?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h5><?$rep=($pro['nom']==NULL)?'Nom et Prénom':$pro['nom'].' '.$pro['prenom']; echo $rep;?></h5>
                        <small><cite title="San Francisco, USA"><h5><i class="glyphicon glyphicon-map-marker">
                                    </i> <?$rep=($pro['lieux']==NULL)?'lieux de résidence':$pro['lieux']; echo $rep;?></h5></cite></small>
                        <p>
                            <h5><i class="glyphicon glyphicon-envelope"></i> <?$rep=($pro['email']==NULL)?'email@gmail.com':$pro['email']; echo $rep;?></h5>
                        <h5><i class="glyphicon glyphicon-globe"></i> <a href="http://www.jquery2dotnet.com">localiser sur google map</a></h5>
                        <h5><i class="glyphicon glyphicon-gift"></i> <?$rep=($pro['date_naiss']==NULL)?'AAAA-MM-JJ':$pro['date_naiss']; echo $rep;?></h5></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <strong>Entez vos information</strong>
            </div>
            <div class="panel-body">
                <form method="post" action="index.php?action=profil&id=<?php echo $_SESSION['auth']['id'] ?>" enctype="multipart/form-data">
                    <?php
                        if(isset($_GET['error'])){
                            if($_GET['error']=='enregistrement réussit'){
                                echo '<div class=\'alert alert-block alert-success\'>'.$_GET['error'].'</div>';
                            }else{
                                echo '<div class=\'alert alert-block alert-danger\'>'.$_GET['error'].'</div>';
                            }

                        }
                    ?>
                    <div class="form-goup">
                        <label for="nom">Nom</label>
                        <p><input type="text" name="nom" value="<?=$pro['nom'] ?>" placeholder="Nom" class="form-control"></p>
                    </div>
                    <div class="form-goup">
                        <label>Prénom</label>
                        <p><input type="text" name="prenom" value="<?=$pro['prenom'] ?>" placeholder="Prénom" class="form-control"></p>
                    </div>
                    <div class="form-goup">
                        <?php
                        if($pro['sexe']=='M') {
                            ?>
                            <p><label for="masculin">Masculin</label><input type="radio" name="sexe" value="M" checked>
                                <label for="feminin">Feminin</label><input type="radio" name="sexe" value="F"></p>
                            <?php
                        }else{
                            ?>
                            <p><label for="masculin">Masculin</label><input type="radio" name="sexe" value="M">
                                <label for="feminin">Feminin</label><input type="radio" name="sexe" value="F" checked></p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-goup">
                        <label for="profile">Photo de profil</label>
                        <p><input type="file" name="profil" class="form-control"></p>
                    </div>
                    <div class="form-goup">
                        <label>Date de naissance</label>
                        <p><input type="date" name='date' value="<?=$pro['date_naiss'] ?>" class="form-control"></p>
                    </div>
                    <div class="form-goup">
                        <label for="lieux">Lieux de résidence</label>
                        <p><input type="text" name="lieux" class="form-control" value="<?=$pro['lieux'] ?>" placeholder="Entrez votre lieux de résidence"></p>
                    </div>
                    <div class="form-goup" style="" align="center">
                        <input type="submit" value="Mettre à jour" name="update" class="btn btn-primary btn-block" style="width:150px;">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
