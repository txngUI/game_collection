<?php

require './Models/user.php';

$valueError = 0;

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"])&& isset($_POST["email"])&&isset($_POST["confirmed-password"]) && isset($_POST["confirmed-password"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmed-password"];
    $email = $_POST["email"];
    
    $valueError = createAccount($name,$surname,$password,$confirmpassword,$email);

}

require './views/inscription.php';
require './views/footer.php';

?>