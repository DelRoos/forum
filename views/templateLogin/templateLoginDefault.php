<?php $title = "message"; ?>
<?php ob_start(); ?>
	<div class="container">
		<div class="row">

			<div class="col-md-12">
                <?php require 'Entete.php';?>
	        </div>

    	</div>

      <div class="row">
          <?php require 'gauche.php';?>
        <section class="col-md-6">
            <div class="panel panel-default">
              <?= $contentLogin ?>  
            </div>
        </section>
          <?php require 'droite.php';?>
      </div>
        <?php require 'footer.php';?>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template.php';?>