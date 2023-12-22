<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/profile.css" />
  <title>Game Collection | Profil</title>
</head>
<body>
  <div class="container">
    <div class="title">
      <h1>Mon profil</h1>
    </div>
    <form method="post" class="profile-form">
      <div class="input">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?php echo $profile['nom_user'] ?>" required>
      </div>
      <div class="input">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $profile['pren_user'] ?>" required>
      </div>
      <div class="input">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?php echo $profile['mail_user'] ?>" required>
      </div>
      <div class="input">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
      </div>
      <div class="input">
        <label for="confirmed-password">Confirmation du mot de passe :</label>
        <input type="password" name="confirmed-password" id="confirmed-password" placeholder="Confirmation du mot de passe" required>
      </div>
      <div class="error">
        <?php echo $error ?>
      </div>
      <div class="submit">
        <input type="submit" class="submit"value="MODIFIER">
      </div>
    </form>
    <form >
      <div class="submit">
        <input type="submit" class="submit"value="SUPPRIMER MON COMPTE">
      </div>
      <div class="submit">
        <input type="submit" class="submit"value="SE DECONNECTER">
      </div>
    </form>
  </div>
</body>
</html>