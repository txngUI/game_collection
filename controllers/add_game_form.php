<?php

require './Models/jeu.php';

$valueError = 0;

if(isset($_POST["name"]) && isset($_POST["editor"]) && isset($_POST["release-date"]) && isset($_POST["description"]) && isset($_POST["cover"]) && isset($_POST["site"])){
  //Cette condition de marche peut-etre pas (checkbox)
  if (isset($_POST["playstation"]) || isset($_POST["xbox"]) || isset($_POST["nintendo"]) || isset($_POST["pc"])){
    $nom = htmlspecialchars($_POST["name"]);
    $edit = htmlspecialchars($_POST["editor"]);
    $date = htmlspecialchars($_POST["release-date"]);
    $desc = htmlspecialchars($_POST["description"]);
    $cover = htmlspecialchars($_POST["cover"]);
    $site = htmlspecialchars($_POST["site"]);

    //fonction qui permet d'ajouter un jeu dans la table jeu (return 1 en cas d'erreur)
    $valueError = addNewGame($nom,$edit,$date,$desc,$cover,$site,$_POST["playstation"],$_POST["xbox"],$_POST["nintendo"],$_POST["pc"]);

    if (!$valueError){
      header("Location: index.php?action=home");
    }
  }

}
require './views/header.php';
require './views/add_game_form.php';
require './views/footer.php';

?>