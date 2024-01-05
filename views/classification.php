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
      <tr>
        <th>Joueur</th>
        <th>Temps passé</th>
        <th>Jeu favori</th>
      </tr>
      <?php
      foreach($listeMeilleurJoueur as $joueur){
        ?>
        <tr>
        <td><?php echo $joueur['nom_user'].' '.$joueur['pren_user'] ?></td>
        <td><?php echo $joueur['somme_temp_jeux']?> h</td>
        <td><?php echo $joueur['nom_jeux']?></td>
      </tr>
       <?php 
      }
      ?>
    </table>
  </div>
</body>
</html>