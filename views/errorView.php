<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
	<h1>Mon super blog !</h1>

	<div class="news">
	    <h3>Erreur :</h3>
	    
	    <p><?= $errorMessage ?></p>
	</div>
	
<?php $content= ob_get_clean(); ?>

<?php
require ('frontend/template.php');
