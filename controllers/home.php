<?php

require './Models/jeu.php';

$listeJeu = array();

session_start();

if (isset($_SESSION)){
    $nomUser = $_SESSION["user_name"];
    $listeJeu = displayGame($_SESSION["id_user"]);
}

require './views/header.php';
require './views/home.php';
require './views/footer.php';

?>