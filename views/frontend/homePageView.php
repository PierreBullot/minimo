<?php $title = 'Minimø - Home'; ?>

<?php ob_start(); ?>


<div class="grid-container">
	<?php
	$first = "1";
	while ($data = $articles->fetch()) // affichage des articles
	{
		if ($first == "1")
		{
		?>
			<div class="cell auto">
				<h4><?= htmlspecialchars($data['post_category']) ?></h4><br/>
			    <h3><?= htmlspecialchars($data['post_title']) ?></h3><br/>
			    
			    <p>
				    <?= nl2br(truncate($data['post_content'], 600)) ?>
				    <br/>
			    </p><br/><br/>
			    <h4><a href="<?= $data['post_name'] ?>">Laisser un commentaire</a></h4><br/><br/><br/>
			</div>
		<?php
			$first = "0";
		}
		else {
		?>
			<div class="cell small-auto medium-3">
			    <h3><?= htmlspecialchars($data['post_title']) ?></h3><br/>
			    
			    <p>
				    <?= nl2br(truncate($data['post_content'], 150)) ?>
				    <br/>
			    </p><br/><br/>
			    <h4><a href="<?= $data['post_name'] ?>">Laisser un commentaire</a></h4><br/><br/>
			</div>
		<?php
		}
	}
	$articles->closeCursor();
	?>
</div> 


<?php $content= ob_get_clean(); ?>

<?php
require ('homeTemplate.php');
//~ require ('assets/blog-simple.html');

