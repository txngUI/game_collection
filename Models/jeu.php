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
function displayGame($idUser) {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT * FROM bilioteque INNER JOIN jeux ON bilioteque.id_jeux=jeux.id_jeux WHERE id_user="'.$idUser.'"');

    $playerGames = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $playerGames;
}

function displayAllGames() {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT * FROM jeux');

    $playerGames = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $playerGames;  
}

function displayGameWithNameLike($name) {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT * FROM jeux WHERE nom_jeux LIKE "%'.$name.'%"');

    $playerGames = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $playerGames;     
}

function addNewGame($idUser,$nom,$edit,$date,$desc,$cover,$site,$playstation,$xbox,$nintendo,$pc) {
    if (!($nom && $edit && $date && $desc && $cover)){ // vérifie que les champs ne soit pas vide
        return 1; // code erreur
    }
    $platerofme = '';
    if ($playstation) $platerofme .= 'playstation,';
    if ($xbox) $platerofme .= 'xbox,';
    if ($nintendo) $platerofme .= 'nintendo,';
    if ($pc) $platerofme .= 'pc,';

    if (!$site) $site = NULL; 

    $bdd = dbConnect();
    $id = getMaxIdJeux();
    $new_jeux = array(
        'id'=>$id,
        'nom'=>$nom,
        'editeur'=>$edit,
        'date'=>$date,
        'plateforme'=>$platerofme,
        'img'=>$cover,
        'desc'=>$desc,
        'url'=>$site
    );
    $bdd_insert_request = $bdd->prepare('INSERT INTO jeux (id_jeux,nom_jeux,editeur_jeux,date_sorite,nom_plateformes,img_jeux,desc_jeux,url_site_jeux)  
    VALUES (:id,:nom,:editeur,:date,:plateforme,:img,:desc,:url)');
    $bdd_insert_request->execute($new_jeux);

    $new_biblio = array (
        'user'=>$idUser,
        'idJeux'=>$id,
        'tempsJeux'=>0
    );
    $bdd_insert_request = $bdd -> prepare('INSERT INTO bilioteque (id_user,id_jeux,temp_jeux) VALUES (:user,:idJeux,:tempsJeux)');
    $bdd_insert_request->execute($new_biblio);
}

?>