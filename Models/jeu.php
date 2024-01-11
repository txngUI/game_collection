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

function getGameWithIdAndUser($id,$idUser) {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT * FROM jeux NATURAL JOIN bilioteque WHERE id_jeux='.$id.' AND id_user='.$idUser);

    $game = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $game[0];      
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

    addToLibrary($idUser,$id);
}

function addToLibrary($idUser,$idGame) {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT * FROM bilioteque WHERE id_user="'.$idUser.'" AND id_jeux="'.$idGame.'"');

    $bilioteque = $query->fetchAll(PDO::FETCH_ASSOC);   

    if ($bilioteque) { // il existe deja l'association dans la BDD -> on retourne le code d'erreur
        return 1;
    }

    $new_biblio = array (
        'user'=>$idUser,
        'idJeux'=>$idGame,
        'tempsJeux'=>0
    );
    $bdd_insert_request = $bdd -> prepare('INSERT INTO bilioteque (id_user,id_jeux,temp_jeux) VALUES (:user,:idJeux,:tempsJeux)');
    $bdd_insert_request->execute($new_biblio);
}


function displayBestPlayers() {
    $bdd = dbConnect();

    $query = $bdd->query('SELECT utilisateur.id_user,pren_user,nom_user,SUM(bilioteque.temp_jeux) AS "somme_temp_jeux",nom_jeux FROM bilioteque INNER JOIN utilisateur ON bilioteque.id_user=utilisateur.id_user 
    INNER JOIN (SELECT bilioteque.id_user,nom_jeux,bilioteque.temp_jeux FROM bilioteque NATURAL JOIN jeux NATURAL JOIN utilisateur INNER JOIN (SELECT id_user,MAX(temp_jeux) AS temp_jeux FROM bilioteque GROUP BY id_user) AS Temp
    ON bilioteque.id_user=Temp.id_user AND bilioteque.temp_jeux=Temp.temp_jeux) AS Temp2 ON Temp2.id_user=utilisateur.id_user
    GROUP BY pren_user,nom_user ORDER BY somme_temp_jeux DESC LIMIT 20');

    $games = $query->fetchAll(PDO::FETCH_ASSOC);   

    return $games;
}

function updateTimeGame($idGame,$idUser,$newTime) {
    if ($newTime < 0) {
        return 1;
    }
    $bdd = dbConnect();

    $query = $bdd -> prepare('UPDATE bilioteque SET temp_jeux='.$newTime.' WHERE id_user='.$idUser.' AND id_jeux='.$idGame);

    $query -> execute();
}

function deleteGameFromLibrary($idGame,$idUser) {
    $bdd = dbConnect();

    $query = $bdd -> prepare('DELETE FROM bilioteque WHERE id_user='.$idUser.' AND id_jeux='.$idGame);

    $query -> execute();
}
?>