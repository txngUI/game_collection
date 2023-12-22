<?php
require './Models/user.php';

$erreur = 0;

if(isset($_POST["email"]) && isset($_POST["password"])){

  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);

  $valueError = connection($mail,$password);

  if (!$valueError){
    header("Location: index.php?action=home");
  }

} 


require './views/auth.php';
require './views/footer.php';

?>