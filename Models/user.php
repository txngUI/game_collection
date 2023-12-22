<?php

function dbConnect(){
    $host = $_ENV['HOST'];
    $dbname = $_ENV['DBNAME'];
    $user = $_ENV['USER'];
    $password = $_ENV['PASSWORD'];
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
    return $bdd;
 }

 function createAccount() {
    $bdd = dbConnect();
    
 }

?>