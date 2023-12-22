<?php

require './views/inscription.php';

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"])&& isset($_POST["email"])&&isset($_POST["confirmed-password"]) && isset($_POST["confirmed-password"])){
    createAccount($_POST["name"],$_POST["surname"],$_POST["password"],$_POST["confirmed-password"],$_POST["email"]);
}

require './views/footer.php';

?>