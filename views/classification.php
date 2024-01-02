<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/classification.css" />
  <title>Game Collection | Classement</title>
</head>
<body>
  <div class="container">
    <div class="title">
      <h1>Classement des temps passés</h1>
    </div>
    <table class="classification">
      <?php
      foreach($listeMeilleurJoueur as $joueur){
        //TODO affichage de chaque joueurs + leurs infos
      }
      ?>
      <tr>
        <th>Joueur</th>
        <th>Temps passé</th>
        <th>Jeu favori</th>
      </tr>
      <tr>
        <td>Marcel Guillaume</td>
        <td>172 h</td>
        <td>Read Dead Redemption</td>
      </tr>
      <tr>
        <td>Marcel Guillaume 2 </td>
        <td>130 h</td>
        <td>GTA 5</td>
      </tr>
      <tr>
        <td>Mauvais goût</td>
        <td>1000 h</td>
        <td>Fortnite</td>
      </tr>
    </table>
  </div>
</body>
</html>