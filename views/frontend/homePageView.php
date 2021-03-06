<?php $title = 'Minimø - Home'; ?>

<?php ob_start(); ?>


<?php
$first = "1";
$number = "1"; //utilisé pour l'affichage de la newsletter et du bouton de chargement
while ($data = $articles->fetch()) // affichage des articles
{
	if ($first == "1") //article mis en avant, affichage différent des autres
	{
		$paragraph = explode("\n", $data['content']); // récupère le premier paragraphe de l'article
		if (isset($data['picture'])) // affiche l'image d'ouvrir grid-container pour qu'elle puisse être plus large que le texte
		{
		?>	
			<img class="main-image" src="assets/images/<?= htmlspecialchars($data['picture']) ?>" alt="<?= htmlspecialchars($data['alt']) ?>" />
		<?php
		}
		else
		{
		?>	
			<img class="main-image" src="https://via.placeholder.com/800x450.png?text=Aucune+image+principale+choisie+pour+cet+article." alt="<?= htmlspecialchars($data['pictures.post_title']) ?>" />
		<?php	
		}
		?>
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
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
	
	
	else  //affiche les articles sous forme de liste
	{
		if ($number == "5") //block de la newsletter, affiché seulement s'il y a assez d'articles
		{
		?>
			</div>
			</div>
				<?php
					include('newsletterView.php');
				?>
			<div class="grid-container">
			<div class="grid-x grid-margin-x">
		<?php
		}
		?>
		
		
		
			<div class="cell small-auto medium-6">
				<?php
				include('articlePreView.php');
				?>
			</div>
		<?php
		$number++;
	}
}
$articles->closeCursor();
?>
		</div> <!--end of grid-x-->
	</div> <!--end of grid-container-->
<?php
if ($number == "7") // si 7 articles ont été affichés, ajoute le bouton "charger plus"
{
?>
	<div class="grid-container">
		<div id="morepost" class="grid-x grid-margin-x"></div>	
	</div>	
	<div id="loadbutton">
		<br/><br/><button type="button" onclick="loadMore()">Charger plus</button><br/><br/><br/><br/><br/><br/>
	</div>
<?php
}
elseif ($first == "1") // si aucun article n'a été trouvé et que donc l'exécution n'est pas passée dans la boucle while
{
	echo '<div id="loadbutton">
			<br/><br/>Aucun article trouvé.<br/><br/><br/><br/>
		</div>';
}
?>

<?php $content= ob_get_clean(); ?>

<?php
require ('homeTemplate.php');

