<?php $title = 'Minimø - Home'; ?>

<?php ob_start(); ?>


<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<?php
		$first = "1";
		while ($data = $articles->fetch()) // affichage des articles
		{
			if ($first == "1") //article mis en avant
			{
				$paragraph = explode("\n", $data['content']);
				if (isset($data['picture']))
				{
				?>	
					<img class="main-image" src="assets/images/<?= htmlspecialchars($data['picture']) ?>" alt="<?= htmlspecialchars($data['alt']) ?>" />
				<?php
				}
				else
				{
				?>	
					<img src="https://via.placeholder.com/800x450.png?text=Aucune+image+principale+choisie+pour+cet+article." alt="<?= htmlspecialchars($data['pictures.post_title']) ?>" />
				<?php	
				}
				?>
				<div class="cell small-12">
					
					<br/><br/><br/><br/>
					<h4><?= htmlspecialchars($data['category']) ?></h4><br/>
				    <h3><?= htmlspecialchars($data['title']) ?></h3><br/>
				    
				    <p>
					    <?= nl2br($paragraph[0]) ?>
					    <br/>
				    </p><br/><br/>
				    <h4><a href="<?= $data['name'] ?>">Laisser un commentaire</a></h4><br/><br/><br/>
				    <br/><br/>
				</div>
			<?php
				$first = "0";
			}
			else { //affiche les articles sous forme de liste
			?>
				<div class="cell small-auto medium-6">
					<?php
					include('articleView.php');
					?>	
				</div>
			<?php
			}
		}
		$articles->closeCursor();
		?>
	</div>
</div> 


<?php $content= ob_get_clean(); ?>

<?php
require ('homeTemplate.php');
//~ require ('assets/blog-simple.html');

