<?php
require_once("models/Repository.php");

class ArticleRepository extends Repository
{
	private $_db; // Instance de PDO

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function __construct()
    {
        $this->setDb($this->dbConnect());
    }
	
	//~ public function add($postId, $author, $content)
	//~ {
		//~ $insertComment = $this->_db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		//~ $inserted = $insertComment->execute(array($postId, $author, $content));
		
		//~ return $inserted;
	//~ }
	
	public function getArticles($category = "all") //récupère les 7 articles publiés les plus récents avec leur image associée, l'article le plus récent en premier
	{
		if($category != "all")
		{
			$req = $this->_db->prepare(
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
								WHERE post_type="article" 
								AND post_status="publish" 
								AND post_category=:category
								ORDER BY post_date DESC LIMIT 0, 7) 
						AS recents 
						LEFT JOIN posts_posts 
						ON recents.id = posts_posts.post_id1) 
				AS articles 
				LEFT JOIN posts 
				ON articles.post_id2 = posts.id
				ORDER BY articles.post_date DESC'
			);
			
			$req->bindValue(':category', $category, PDO::PARAM_STR);
			$req->execute();
			
			return $req;
				//~ break;
			
			
			//~ case "photos":
				
				//~ break;
			
			
			//~ case "musique":
				
				//~ break;
			
			
			//~ case "visites":
				
				
				//~ break;
			
		}	
		//~ default :
		$req = $this->_db->prepare(
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
							ORDER BY post_date DESC LIMIT 0, 7) 
					AS recents 
					LEFT JOIN posts_posts 
					ON recents.id = posts_posts.post_id1) 
			AS articles 
			LEFT JOIN posts 
			ON articles.post_id2 = posts.id
			ORDER BY articles.post_date DESC'
		);
		
		$req->execute();
		
		return $req;
		
	}
	
	//~ public function getCommentContent($commentId)
	//~ {
		//~ $comment = $this->_db->prepare('SELECT comment FROM comments WHERE id = ?');
		//~ $comment->execute(array($commentId));
	
		//~ return $comment;
	//~ }
}
