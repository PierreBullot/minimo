<?php

$db = new PDO('mysql:host=localhost;dbname=minimo;charset=utf8', 'admin', 'admin');

$load = $db->query(
	'SELECT articles.id AS id, 
			articles.post_author AS author, 
			articles.post_title AS title, 
			articles.post_content AS content, 
			articles.post_status AS status, 
			articles.post_name AS name, 
			articles.post_category AS category, 
			posts.post_title AS alt, 
			posts.post_name AS picture 
	FROM (	SELECT * 
			FROM (	SELECT id, post_author, post_title, post_content, post_status, post_name, post_category, post_date 
					FROM posts 
					WHERE post_type="article" AND post_status="publish" 
					ORDER BY post_date DESC LIMIT 7, 2) 
			AS recents 
			LEFT JOIN posts_posts 
			ON recents.id = posts_posts.post_id1) 
	AS articles 
	LEFT JOIN posts 
	ON articles.post_id2 = posts.id
	ORDER BY articles.post_date DESC'
);


var_dump($load);
while ($data = $load->fetch())
{
	echo 'test2';
	echo '<div class="cell small-auto medium-6">';
	if (isset($data['picture']))
	{
		echo '<img src="assets/images/'.htmlspecialchars($data['picture']).'" alt="'.htmlspecialchars($data['alt']).'" />';
	}
	else
	{
		echo '<img src="https://via.placeholder.com/700x450.png?text=Aucune+image+principale+choisie." alt="Aucune image trouvée" />';
	}
	echo '<br/><br/>
		<h4>'.htmlspecialchars($data['category']).'</h4><br/>
		<h3>'.htmlspecialchars($data['title']).'</h3><br/>
		
		<p>
		    '.nl2br(truncate($data['content'], 150)).'
		    <br/>
		</p><br/><br/>
		<h4><a href="'.$data['name'].'">Laisser un commentaire</a></h4><br/><br/>
		<br/><br/>
	</div>';
}
$load->closeCursor();
