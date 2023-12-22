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
    //$password = hash("sha256",$password);

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
?>