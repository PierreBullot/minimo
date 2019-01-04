<?php $title = 'Minimø'; ?>

<?php ob_start(); ?>
<!--
	<h1>Mon super blog !</h1>
	<p>Derniers billets du blog :</p>
-->

	<?php
	//~ while ($data = $posts->fetch())
	//~ {
	?>
<!--
		<div class="news">
		    <h3>
				<?= htmlspecialchars($data['title']) ?>
				<em>le <?php echo $data['creation_date_fr']; ?></em>
		    </h3>
		    
		    <p>
			    <?= nl2br(htmlspecialchars($data['content'])) ?>
			    <br />
			    <em><a href="index.php?action=comments&post=<?= $data['id'] ?>">Commentaires</a></em>
		    </p>
		</div>
-->
	<?php
	//~ } // Fin de la boucle des billets
	//~ $posts->closeCursor();
	?>
	
<?php $content= ob_get_clean(); ?>

<?php
require ('homeTemplate.php');
//~ require ('assets/blog-simple.html');

