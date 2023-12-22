<?php

  require './Models/profile.php';

  $profile = getProfile($_SESSION['id_user']);

  $error = '';
  
  if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']) 
  && isset($_POST['confirmed-password'])) {
    if ($_POST['password'] != $_POST['confirmed-password']) {
      $error = 'Les mots de passe ne correspondent pas';
    } else {
      $password = hash("sha256",$_POST['password']);
      updateProfile($profile['id_user'],$_POST['nom_user'],$_POST['pren_user'],$_POST['mail_user'],$_POST['mdp_user']);
      header('Location: index.php?page=profile');
    }
  }

  require './views/header.php';
  require './views/profile.php';
  require './views/footer.php';

?>