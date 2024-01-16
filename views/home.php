<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/home.css" />
  <title>Game Collection | Home</title>
</head>
<body>
  <div class="container">
    <div class="header">
      <p>salut <?php echo $nomUser ?> ! <br> prêt à ajouter des <br> jeux à ta collection ?</p>
    </div>
  </div>
  <div class="games">
    <p id="title-game">Mes jeux</p>
    <div class="container-games">
      <?php
      foreach($listeJeu as $jeu){ 
        ?>
        <a href='update_game?IdGame=<?php echo $jeu["id_jeux"]?>'>
        <div class="game" style="background: linear-gradient(
          0deg,
          rgba(0, 0, 0, 0.94) 11%,
          rgba(0, 0, 0, 0.78) 45%,
          rgba(255, 255, 255, 0) 100%
        ),
        url('<?php echo $jeu['img_jeux'] ?>');background-size:cover;">
            <div class="informations">       
              <div style="display:flex;justify-content:space-between;align-items:center;">
                <p class="game-name"><?php echo $jeu['nom_jeux'] ?></p>
                <p class="game-times-played"><?php echo $jeu['temp_jeux'] ?> h</p>
              </div>
              <p class="game-plateform"><?php echo $jeu['nom_plateformes'] ?></p>
            </div>
          </div> 
          </a>
      <?php
      }
      ?>
    </div>
  </div>
</body>
</html>