<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/fontawesome.css">
	<title><?= $title ?></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<div id="photoprofile">
							<img src="public/user/profile/profilUser.png" class="img-circle" width="100px" height="100px">
							<h2 id="login"><?= ucfirst($_SESSION['auth']['login']); ?></h2>
						</div>
					</div>

					<ul class="nav navbar-nav" id="navigation">
						<li><a href="#">Notififation</a></li>
						<li><a href="#">Statut</a></li>
						<li><a href="#">Message</a></li>
						<li><a href="#">Groupe</a></li>
					</ul>

					<input type="button" id="deconnect" class="btn btn-primary navbar-right" onclick=window.location.href='index.php?action=connexion'; value="Deconnexion" />
				</div>

	        </div>
    	</div>

      <div class="row">

        <div class="col-md-3">
            <div class="panel panel-default">
				<div class="panel-heading">Invitation</div>
				<div class="panel-body">
					liste des invitations
				</div>
			</div>

           	<div class="panel panel-default">
				<div class="panel-heading">Connaissez-vous ?</div>
				<div class="panel-body">
					liste membre
				</div>
			</div>
        </div>

        <section class="col-md-6">
          <?= $content ?>
            <div class="panel panel-default">
				<div class="panel-body">
					liste des invitations
				</div>
			</div>
        </section>

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
					liste amis
				</div>
			</div>
        </div>

      </div>

      <footer class="row">
        <div class="col-md-12">
          Pied de page()
        </div>
      </footer>

	</div>
	
</body>
	<script type="text/javascript" src="public/bootstrap.js"></script>
	<script type="text/javascript" src="public/jquery.js"></script>
</html>