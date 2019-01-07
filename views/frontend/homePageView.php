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
				<?php
				if (isset($data['picture']))
				{
				?>	
					<img src="assets/images/<?= htmlspecialchars($data['picture']) ?>" alt="<?= htmlspecialchars($data['pictures.post_title']) ?>" />
				<?php
				}
				else
				{
				?>	
					<img src="assets/images/logo_minimo.png" alt="<?= htmlspecialchars($data['pictures.post_title']) ?>" />
				<?php	
				}
				?>
				<br/><br/><br/><br/>
				<h4><?= htmlspecialchars($data['category']) ?></h4><br/>
			    <h3><?= htmlspecialchars($data['title']) ?></h3><br/>
			    
			    <p>
				    <?= nl2br(truncate($data['content'], 600)) ?>
				    <br/>
			    </p><br/><br/>
			    <h4><a href="<?= $data['name'] ?>">Laisser un commentaire</a></h4><br/><br/><br/>
			    <br/><br/>
			</div>
		<?php
			$first = "0";
		}
		else {
		?>
			<div class="cell small-auto medium-3">
				<?php
				if (isset($data['picture']))
				{
				?>	
					<img src="assets/images/<?= htmlspecialchars($data['picture']) ?>" alt="<?= htmlspecialchars($data['pictures.post_title']) ?>" />
				<?php
				}
				else
				{
				?>	
					<img src="assets/images/logo_minimo.png" alt="<?= htmlspecialchars($data['pictures.post_title']) ?>" />
				<?php	
				}
				?>
				<br/><br/>
				<h4><?= htmlspecialchars($data['category']) ?></h4><br/>
			    <h3><?= htmlspecialchars($data['title']) ?></h3><br/>
			    
			    <p>
				    <?= nl2br(truncate($data['content'], 150)) ?>
				    <br/>
			    </p><br/><br/>
				<h4><a href="<?= $data['name'] ?>">Laisser un commentaire</a></h4><br/><br/>
				<br/><br/>
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

