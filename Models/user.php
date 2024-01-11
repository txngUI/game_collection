<?php

function dbConnect(){
    $host = $_ENV['HOST'];
    $dbname = $_ENV['DBNAME'];
    $user = $_ENV['USER'];
    $password = $_ENV['PASSWORD'];
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
    return $bdd;
 }

function getMaxIdUser()
{
    $bdd = dbConnect();
    $maxQuery = $bdd->query('SELECT COUNT(id_user) AS "nb" FROM utilisateur');
    $users = $maxQuery->fetchAll(PDO::FETCH_ASSOC);
    return $users[0]['nb'];
}


 function createAccount($name,$surname,$password,$confirmedPassword,$mail) {
    if ($password != $confirmedPassword) {
        return 1;
    }
    $bdd = dbConnect();

    $id= getMaxIdUser();
    $password = hash("sha256",$password);

    $new_user = array(
        'id'=>$id,
        'pren'=>$name,
        'mail'=>$mail,
        'password'=>$password,
        'surname'=>$surname
    );

    $bdd_insert_request = $bdd->prepare('INSERT INTO utilisateur (id_user,pren_user,mail_user,mdp_user,nom_user)  VALUES (:id,:pren,:mail,:password,:surname)');
    $result =  $bdd_insert_request->execute($new_user);
 }

 function connection($mail,$password) {
    $password = hash("sha256",$password);

    $bdd = dbConnect();
    $query = $bdd -> query('SELECT mdp_user,id_user,nom_user FROM utilisateur WHERE mail_user="'.$mail.'"');
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($users)==0)return 1;
    foreach ($users as $user) {
        if ($password == $user['mdp_user']) {
            session_start();
            $_SESSION["id_user"] = $user['id_user'];
            $_SESSION["user_name"] = $user['nom_user'];
        } else {
            return 1;
        }
    }
 }
?>