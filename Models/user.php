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
    $maxQuery = $bdd->query('SELECT Id_user FROM utilisateur');
    $users = $maxQuery->fetchAll(PDO::FETCH_ASSOC);
    $maxNombre = -1;
    foreach ($users as $value) {
        $nombre = intval($value["Id_user"]);
        if ($nombre > $maxNombre) {
            $maxNombre = $nombre;
        }
    }
    return $maxNombre;
}


 function createAccount($name,$surname,$password,$confirmedPassword) {
    if ($password != $confirmedPassword) {
        return 1;

    }
    $bdd = dbConnect();
    $id= getMaxIdUser();
    $mail="test@test.test";
    $password = password_hash("sha256",$password);

    $new_user = array(
        'id'=>$id,
        'pren'=>$name,
        'mail'=>$mail,
        'password'=>$password,
        'surname'=>$surname
    );

    $bdd_insert_request = $bdd->prepare('INSERT INTO utilisateur  VALUES (:id,:name,:mail,:password,:surname)');
    $result =  $bdd_insert_request->execute($new_user);
 }

?>