<?php

function dbConnect(){
    $host = $_ENV['HOST'];
    $dbname = $_ENV['DBNAME'];
    $user = $_ENV['USER'];
    $password = $_ENV['PASSWORD'];
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
    return $bdd;
 }

 function getMaxIdJeux()
 {
     $bdd = dbConnect();
     $maxQuery = $bdd->query('SELECT COUNT(id_jeux) AS "nb" FROM jeux');
     $games = $maxQuery->fetchAll(PDO::FETCH_ASSOC);
     return $games[0]['nb'];
 }

 function createGame($nom,$editeur,$dateSortie,$nomPlateforme,$imgJeux,$descJeux,$urlSite) {
    $bdd = dbConnect();

    $id = getMaxIdJeux();

    $new_jeux = array(
        'id'=>$id,
        'nom'=>$nom,
        'editeur'=>$editeur,
        'date'=>$dateSortie,
        'plateforme'=>$nomPlateforme,
        'img'=>$imgJeux,
        'desc'=>$descJeux,
        'url'=>$urlSite
    );

    $bdd_insert_request = $bdd->prepare('INSERT INTO utilisateur (id_user,pren_user,mail_user,mdp_user,nom_user)  VALUES (:id,:pren,:mail,:password,:surname)');
    $result =  $bdd_insert_request->execute($new_jeux);
 }

function displayGame($idUser) {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT * FROM bilioteque INNER JOIN jeux ON bilioteque.id_jeux=jeux.id_jeux WHERE id_user="'.$idUser.'"');

    $playerGames = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $playerGames;
}


?>