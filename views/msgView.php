<?php ob_start(); ?>
<?php if (isset($_GET['id_freind']) && !empty($_GET['id_freind']) && $_GET['action']=='msg') {?>

<?php 
	$profilForUser = profilUser($_GET['id_freind']);
	$msg=selectMsg($_SESSION['auth']['id'], $_GET['id_freind']);
?>
	<div id="userProfil" class="panel-heading" >
        <img class="img-circle" width="40px" height="40px" src="public/user/profil/<?$rep=($profilForUser['profil']==NULL)?'profilUser.png':$profilForUser['profil']; echo $rep;?>">
        <?= ucfirst($profilForUser['pseudo']);?>
	</div><br>
	<div class="panel-body">
		<?php
			if ($msg->rowcount()==0) {
				echo "Vous n'avez eu aucune conversation";
			}elseif ($msg->rowcount()>0) {
				while ($message=$msg->fetch(PDO::FETCH_ASSOC)) {
					if ($message['id_envoyeur']==$_SESSION['auth']['id']) {
		?>
			<div class="pull-right" id="message" style="color:white;background-color:#337ab7; padding: 5px 10px 5px 10px; border-radius: 5px;"><?= $message['contenu']; ?></div><br><br>
		<?php				
					}else{
		?>
			<div class="pull-left" id="message" style="color:white;background-color: darkslategrey; padding: 5px 10px 5px 10px; border-radius: 5px;"><?= $message['contenu']; ?></div><br><br>
		<?php
					}
				}
			}
		?>
	</div>
	<br>
	<div class="panel-heading">
		<form action="index.php?action=sendmsg" method="post" class="form-inline">
            <div class="input-group col-md-12">
                <input type="text" name="message" class="form-control" placeholder="Taper un message...">
                <input type="hidden" name="id_freind" value="<?= $_GET['id_freind'];?>">
	            <div class="input-group-btn">
	                <button type="submit" class="btn btn-success" name="msg" style="height: 34px;"><span class="glyphicon glyphicon-send"></span>
	                </button>
	            </div>
            </div>
        </form>

	</div>

<?php $contentLogin=ob_get_clean();?>

<?php }else if(!isset($_GET['id_freind']) && $_GET['action']=='msg') {

	$freindMsg = selectFreindMsg($_SESSION['auth']['id']);

	if ($freindMsg->rowcount()>0) {
		echo "<ul class=\"nav nav-bar\">";

			while ($freind = $freindMsg->fetch(PDO::FETCH_ASSOC)) {
				$profilUse = profilUser($freind['id_user']);
				$endMsg = selectEndMsg($_SESSION['auth']['id'], $freind['id_user'])->fetch(PDO::FETCH_ASSOC);
				if ($freind['id_user']!=$_SESSION['auth']['id'] && $endMsg>=1) {
					
?>
	<a href="index.php?action=msg&id_freind=<?= $freind['id_user'];?>" id="listFreind">
		<li class="row" id="freind">
			<div class="col-md-12" id="myfreind">
				<div id="userProfil" class="col-md-2" >
			        <img class="img-circle" width="40px" height="40px" src="public/user/profil/<?$rep=($profilUse['profil']==NULL)?'profilUser.png':$profilUse['profil']; echo $rep;?>">
				</div>
				<div class="col-md-8">
					<b><?= ucfirst($profilUse['pseudo']);?></b><br>
					<h5><?= $endMsg['contenu']; ?></h5>
				</div>
			</div>
		</li>
	</a>
<?php			
				}
			}
		
		echo "</ul>";

	}else{
		echo "<h1>Vous n'avez eu aucune conversation </h1>";
	}

?>
<?php $contentLogin=ob_get_clean();?>
<?php } ?>

<?php require('templateLogin/templateLoginDefault.php'); ?>