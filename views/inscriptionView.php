<?php ob_start(); ?>
<?php $title = "inscription"; ?>
<img class="background" src="public/images/background.jpg">

<div id="milieu" class="formulaire">

	<div class="panel-heading" id="titre">
		<div class="panel-title text-center">
           	<h1 class="title">Inscription</h1>
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
		<?php } ?>

		<form method="post" action="index.php?action=addUser">
			
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
					<input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required="required" pattern="[0-9a-z]{8,}">
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-envelope"></i>
					</span>
					<input type="email" name="email" class="form-control" placeholder="email ex:delano@gmail.com" required="required" pattern="[gmail]{1}[.com]{1}$">
				</div>
			</div>

			<div class="form-group small clearfix" id="lien">
            	<a href="index.php?action=connexion" class="forgot-link">j'ai déja un compte</a>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-block btn-lg" name="valider" value="S'inscrire">
			</div>

		</form>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>