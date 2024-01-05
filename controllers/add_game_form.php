<?php
session_start();

require './Models/jeu.php';

$valueError = 0;

if(isset($_POST["name"]) && isset($_POST["editor"]) && isset($_POST["release-date"]) && isset($_POST["description"]) && isset($_POST["cover"]) && isset($_POST["site"])){


  //Ces condition permette d'initialiser si se n'est pas fait les 4 var dans post qui seront utiliser après
  if (!(isset($_POST["playstation"]))) {
    $_POST["playstation"]='';
  }
  if (!(isset($_POST["xbox"]))) {
    $_POST["xbox"]='';
  }
  if (!(isset($_POST["nintendo"]))) {
    $_POST["nintendo"]='';
  }
  if (!(isset($_POST["pc"]))) {
    $_POST["pc"]='';
  }

  $nom = htmlspecialchars($_POST["name"]);
  $edit = htmlspecialchars($_POST["editor"]);
  $date = htmlspecialchars($_POST["release-date"]);
  $desc = htmlspecialchars($_POST["description"]);
  $cover = htmlspecialchars($_POST["cover"]);
  $site = htmlspecialchars($_POST["site"]);

  //fonction qui permet d'ajouter un jeu dans la table jeu (return 1 en cas d'erreur)
  $valueError = addNewGame($_SESSION['id_user'],$nom,$edit,$date,$desc,$cover,$site,$_POST["playstation"],$_POST["xbox"],$_POST["nintendo"],$_POST["pc"]);

  if (!$valueError){
    header("Location: index.php?action=home");
  }

}
require './views/header.php';
require './views/add_game_form.php';
require './views/footer.php';

?>