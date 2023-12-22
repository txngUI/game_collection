<?php
require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'register') {
    require 'controllers/inscription.php';
  } else if ($_GET['action'] == 'home') {
    require 'controllers/home.php';
  } else if ($_GET['action'] == 'add_game') {
    require 'controllers/add_game.php';
  } else if ($_GET['action'] == 'add_game_form') {
    require 'controllers/add_game_form.php';
  } else if ($_GET['action'] == 'update_game') {
    require 'controllers/update_game.php';
  } else if ($_GET['action'] == 'classification') {
    require 'controllers/classification.php';
  } else if ($_GET['action'] == 'profile') {
    require 'controllers/profile.php';
  } else if ($_GET['action'] == 'logout') {
    session_start();
    session_destroy();
    header('Location: index.php');
  }
} else {
  require 'controllers/auth.php';
}
?>