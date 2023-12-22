<?php

require './Models/user.php';

$valueError = 0;

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"])&& isset($_POST["email"])&& isset($_POST["confirmed-password"])){
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmpassword = htmlspecialchars($_POST["confirmed-password"]);
    $email = htmlspecialchars($_POST["email"]);
    
    $valueError = createAccount($name,$surname,$password,$confirmpassword,$email);

    if (!$valueError){
        header("Location: index.php?action=home");
    }

}

require './views/inscription.php';
require './views/footer.php';

?>