<?php

require './Models/jeu.php';

//fonction qui return une liste avec le temps totale jouer des 20 meilleurs utilisateur 
//avec en plus le nom du jeu auquelle ils ont le plus jouer (le temps totale jouer trier par ordre décroissant)
$listeMeilleurJoueur = displayBestPlayers();


require './views/header.php';
require './views/classification.php';
require './views/footer.php';

?>