<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/update.css" />
  <title>Game Collection | Ajouter un jeu</title>
</head>
<body>
  <div class="game_update">
    <div class="desc">
      <h1><?php echo $game['nom_jeux']?></h1>
      <p class="description"><?php echo $game['desc_jeux']?></p>
      <p class="time-played">Temps passé : <?php echo $game['temp_jeux']?>  h</p>
      <h2>Modifier le temps passé sur le jeu</h2>
      <form method="post">
      <div class="modify-time">
        <label>Temps passé sur le jeu</label>
        <input type="number" name="time-played" id="time-played"/>
      </div>
      <div class="submit" style="margin-top: 15px;">
        <input type="submit" class="add-game" value="AJOUTER">
      </div>
      <div class="submit" style="margin-top: 15px;">
        <input type="submit" name="delete-game" class="delete-game" value="SUPPRIMER LE JEU DE MA BIBLIOTHEQUE">
      </div>
      </form>
    </div>
    <div class="img">
      <img src="<?php echo $game['img_jeux']?>" style="width:200px;" alt="Red Dead Redemption">
    </div>

  </div>
</body>
</html>