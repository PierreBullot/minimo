<?php
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) //si l'email est valide
{
	$email = $_POST['email'];
	
	$db = new PDO('mysql:host=localhost;dbname=minimo;charset=utf8', 'admin', 'admin');
	
	$check = $db->prepare('SELECT newsletter_email FROM newsletter WHERE newsletter_email=:email');
	$check->bindValue(':email', $email, PDO::PARAM_STR);
	$check->execute();
	if($check->fetch())
	{
		echo 'Cette adresse email est déjà enregistrée!';
	}
	else
	{
		$add = $db->prepare('INSERT INTO newsletter (newsletter_email) VALUES (:email)');
		$add->bindValue(':email', $email, PDO::PARAM_STR);
		$add->execute();
		
		echo 'Merci de vous être abonné!';
	}
}
else
{
	echo 'Cette adresse email n\'est pas valide.';
}


//~ {
//~ $Syntax='#^[w.-]+@[w.-]+.[a-zA-Z]{2,5}$#';
//~ if(preg_match($Syntaxe,$adrdess))
//~ return true;
//~ else
//~ return false;
//~ }
