<?php
require_once('models/PageRepository.php');
require_once('models/ArticleRepository.php');

function homePage()
{
	$articleRepository = new ArticleRepository();
	$articles = $articleRepository->getArticles();
	
	require('views/frontend/homePageView.php');
}

//~ function comments()
//~ {
	//~ $postRepository = new PostRepository();
    //~ $commentRepository = new CommentRepository();
    
	//~ $post = $postRepository->getPost($_GET['post']);
    //~ $comments = $commentRepository->getComments($_GET['post']);
    
    //~ require('view/frontend/commentsView.php');
//~ }

//~ function addComment($postId, $author, $content)
//~ {
    //~ $commentRepository = new CommentRepository();
    
	//~ $inserted = $commentRepository->add($postId, $author, $content);
	
	//~ if ($inserted === false)
	//~ {
		//~ throw new Exception('Impossible d\'ajouter le commentaire !');
	//~ }
	//~ else
	//~ {
		//~ header('Location: index.php?action=comments&post=' . $postId);
	//~ }
//~ }
