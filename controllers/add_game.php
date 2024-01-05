<?php

require './Models/jeu.php';

if (isset($_GET['name'])) {
  $listeJeux = displayGameWithNameLike($_GET['name']);
} else {
  $listeJeux = displayAllGames();
}


  require './views/header.php';
  require './views/add_game.php';
  require './views/footer.php';
?>