<?php

require './Models/jeu.php';

$listeJeu = array();

session_start();

if (isset($_SESSION)){
    //fonction qui return la liste des jeux de l'utilisateur (toutes les infos sur le jeu)
    $listeJeu = displayGame($_SESSION["id_user"]);
    $nomUser = $_SESSION["user_name"];
}

require './views/header.php';
require './views/home.php';
require './views/footer.php';

?>