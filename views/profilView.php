<?php ob_start(); ?>
<?php $title = $_SESSION['auth']['login']; ?>

	

<?php $content = ob_get_clean(); ?>
<?php require('templateLogin.php'); ?>