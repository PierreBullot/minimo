<?php
require_once("models/Repository.php");

class PageRepository extends Repository
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
	
	//~ public function add()
	//~ {
		//~ $insertPost = $this->_db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
		//~ $inserted = $insertPost->execute(array($post->title(), $post->content()));
		
		//~ return $inserted;
	//~ }
	
	public function getPage($pageId)
	{
		$page = $this->_db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
		$page->execute(array($pageId));
		
		return $page->fetch();
	}
}
