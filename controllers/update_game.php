<?php

require './Models/jeu.php';
session_start();
$valueError = 0;

if (isset($_GET['IdGame'])) {
  $game = getGameWithIdAndUser($_GET['IdGame'],$_SESSION['id_user']);


if(isset($_POST["time-played"])){
  $time = (int)($_POST["time-played"]); // conversion en int

  //fonction qui modifie le temps de jeu et return 1 si il y a une erreur
  $valueError = updateTimeGame($_GET['IdGame'],$_SESSION['id_user'],$time); //(Recupération du nom du jeu par la méthode get lors de la redirection [la redirection n'est pas là])
  if (!$valueError) {
    header("Location: index.php?action=home");
  }
}

//Pour la suppression du jeu de la bibliotheque
if (isset($_POST['delete-game'])) {
  deleteGameFromLibrary($_GET['IdGame'],$_SESSION['id_user']);
  header("Location: index.php?action=home");
}

}




require './views/header.php';
require './views/update_game.php';
require './views/footer.php';

?>