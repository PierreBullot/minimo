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
	
	public function getArticles()
	{
		$req = $this->_db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
		
		return $req;
	}
	
	//~ public function getCommentContent($commentId)
	//~ {
		//~ $comment = $this->_db->prepare('SELECT comment FROM comments WHERE id = ?');
		//~ $comment->execute(array($commentId));
	
		//~ return $comment;
	//~ }
}
