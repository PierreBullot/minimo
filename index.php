<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');

session_start();

if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location: .');
  exit();
}

require('controllers/frontend.php');


if (isset($_GET['category']))
{
	categoryPages($_GET['category']);
}
else{
	homePage();
}


