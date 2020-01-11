<?php ob_start(); ?>
<?php $title = "connexion"; ?>

<img class="background" src="public/images/background.jpg">
<div id="milieu" class="formulaire">

	<div class="panel-heading" id="titre">
		<div class="panel-title text-center">
           	<h1 class="title">Connexion</h1>
       		<hr />
		</div>
	</div>

	<div class="modal-body" id="connexion">

		<?php 
			if (isset($_GET['erreur'])) {
		?>
		<div class="alert alert-danger alert-dismissable col-lg-3" id="erreur">
			<?= $_GET['erreur']; ?>
		</div>
            <?php } ?><br/>

		<form method="post" action="index.php?action=connect" >

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-user"></i>
					</span>
					<input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" required="required">
				</div>
			</div>

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-lock"></i>
					</span>
					<input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required="required">
				</div>
			</div>

			<div class="form-group small clearfix" id="lien">
            	<a href="index.php?action=inscription" class="forgot-link">Créé un compte</a>
                <a href="#" class="forgot-link">Mot de passe oublier?</a>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-block btn-lg" name="connexion" value="Se connecter">
			</div>

		</form>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>