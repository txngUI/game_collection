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
      <h1>Read Dead Redemption</h1>
      <p class="description">Jeu trop cool</p>
      <p class="time-played">Temps passé : 60h</p>
      <h2>Modifier le temps passé sur le jeu</h2>
      <div class="modify-time">
        <label>Temps passé sur le jeu</label>
        <input type="number" name="time-played" id="time-played"/>
      </div>
      <div class="submit" style="margin-top: 15px;">
        <input type="submit" class="add-game"value="AJOUTER">
      </div>
      <div class="submit" style="margin-top: 15px;">
        <input type="submit" class="delete-game"value="SUPPRIMER LE JEU DE MA BIBLIOTHEQUE">
      </div>
    </div>
    <div class="img">
      <img src="https://prod-printler-front-as.azurewebsites.net/media/photo/148332-1.jpg?mode=crop&width=727&height=1024&rnd=0.0.1" style="width:200px;" alt="Red Dead Redemption">
    </div>

  </div>
</body>
</html>