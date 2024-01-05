<?php
session_start();

require './Models/jeu.php';

if (isset($_GET['name'])) {
  $listeJeux = displayGameWithNameLike($_GET['name']);
} else {
  $listeJeux = displayAllGames();
}

if (isset($_POST['idJeux'])) {
  addToLibrary($_SESSION['id_user'],$_POST['idJeux']);
}

  require './views/header.php';
  require './views/add_game.php';
  require './views/footer.php';
?>