<?php

function dbConnect(){
  $host = $_ENV['HOST'];
  $dbname = $_ENV['DBNAME'];
  $user = $_ENV['USER'];
  $password = $_ENV['PASSWORD'];
  $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
  return $bdd;
}

function getProfile($id){
  $bdd = dbConnect();
  $req = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE id_user = ?');
  $req->execute(array($id));
  $profile = $req->fetch();
  return $profile;
}

function updateProfile($id, $nom, $prenom, $email, $password) {
    $bdd = dbConnect();

    $new_user = array(
        'id'=>$id,
        'pren'=>$prenom,
        'mail'=>$email,
        'password'=>$password,
        'surname'=>$nom
    );

    $bdd_insert_request = $bdd->prepare('UPDATE utilisateur SET pren_user = :pren, mail_user = :mail, mdp_user = :password, nom_user = :surname  WHERE id_user = :id');
    $result =  $bdd_insert_request->execute($new_user);
}


function deleteProfile($id){
  $bdd = dbConnect();
  $req = $bdd->prepare('DELETE FROM UTILISATEUR WHERE id_user = ?');
  $req->execute(array($id));
}
?>