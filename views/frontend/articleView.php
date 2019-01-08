<?php
if (isset($data['picture']))
{
?>	
	<img src="assets/images/<?= htmlspecialchars($data['picture']) ?>" alt="<?= htmlspecialchars($data['alt']) ?>" />
<?php
}
else
{
?>	
	<img src="https://via.placeholder.com/700x450.png?text=Aucune+image+principale+choisie." alt="Aucune image trouvée" />
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
