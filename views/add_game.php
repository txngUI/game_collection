<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/add_game.css" />
  <title>Game Collection | Ajouter un jeu</title>
</head>
<body>
  <form class="search-game">
    <div class="search">
      <label for="name">Ajouter un jeu à la bibliothèque</label>
      <input type="text" name="name" id="name" placeholder="Rechercher un jeu">
    </div>
    <div class="submit">
      <input type="submit" class="submit"value="RECHERCHER">
    </div>
  </form>
  <div class="container">
    <div class="title">
      <p>Mes jeux</p>
    </div>

    <div class="games">
      <?php
      foreach($listeJeux as $jeu){ 
        ?>
      <div class="game" style="background: linear-gradient(
      0deg,
      rgba(0, 0, 0, 0.94) 11%,
      rgba(0, 0, 0, 0.78) 45%,
      rgba(255, 255, 255, 0) 100%
    ),url('<?php echo $jeu['img_jeux'] ?>');background-size:cover;">
        <form method=POST>
          <input type="hidden" name="idJeux" value='<?php echo $jeu['id_jeux'] ?>'>
          <input type="submit" class="add-button" value="Ajouter à la bibliothèque">
        </form>
        <div class="informations">
          <p class="name"><?php echo $jeu['nom_jeux'] ?></p>
          <p class="platform"><?php echo $jeu['nom_plateformes'] ?></p>
        </div>
      </div>
      <?php
      }
      ?>
      </div>
    </div>
  </div>
</body>
</html>