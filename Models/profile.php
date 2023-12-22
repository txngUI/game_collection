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

function updateProfile($id,$nom,$prenom,$email,$password){
  $bdd = dbConnect();
  $req = $bdd->prepare('UPDATE UTILISATEUR SET nom_user= ?, pren_user = ?, mail_user = ?, mdp_user = ? WHERE id_user = ?');
  $req->execute(array($nom,$prenom,$email,$password,$id));
}

function deleteProfile($id){
  $bdd = dbConnect();
  $req = $bdd->prepare('DELETE FROM UTILISATEUR WHERE id_user = ?');
  $req->execute(array($id));
}

function logout(){
  session_start();
  session_destroy();
  header('Location: ../index.php');
}

?>