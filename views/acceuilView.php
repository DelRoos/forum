<?php ob_start(); ?>
<?php $title = "connexion"; ?>

<img class="background" src="public/images/background.jpg">
<div class = "container-fluid">
	<div class="acceuil" id="milieu">
		<h1>Bienvennue</h1>
		<div id="connect">
			<input type="button" id="button" class="btn btn-primary" onclick=window.location.href='index.php?action=inscription'; value="S'inscrire" />
			<input type="button" id="button" class="btn btn-primary" onclick=window.location.href='index.php?action=connexion'; value="Se connecter" />
		</div>
	</div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>