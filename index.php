<?php
require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'register') {
    require 'views/inscription.php';
  } else if ($_GET['action'] == 'home') {
    require 'views/home.php';
  }
} else {
  require 'views/auth.php';
}
?>