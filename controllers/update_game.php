<?php

require './Models/jeu.php';

$valueError = 0;

if(isset($_POST["time-played"])){
  //fonction qui modifie le temps de jeu et return 1 si il y a une erreur
  $valueError = changePlayTime($_POST["time-played"]); //(Recupération du nom du jeu par la méthode get lors de la redirection [la redirection n'est pas là])
}

//Pour la suppression du jeu de la bibliotheque
//delGameLibrary();

require './views/header.php';
require './views/update_game.php';
require './views/footer.php';

?>