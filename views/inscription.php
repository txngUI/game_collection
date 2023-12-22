<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css" />
  <title>Game Collection | S'inscrire</title>
</head>
<body>
  <div class="container">
    <h1>Se connecter a Game Collection</h1>
    <form action="" method="post">
      <div class="input">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required>
      </div>
      <div class="input top" style="margin-top: 15px;">
        <label for="surname">Prénom</label>
        <input type="text" name="surname" id="surname" required>  
      </div>
      <div class="input top" style="margin-top: 15px;">
        <label for="email">Adresse Mail</label>
        <input type="text" name="email" id="email" required>  
      </div>
      <div class="input top" style="margin-top: 15px;">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>  
      </div>
      <div class="input top" style="margin-top: 15px;">
        <label for="confirmed-password">Confirmation du mot de passe</label>
        <input type="password" name="confirmed-password" id="confirmed-password" required>  
      </div>
      <input class="submit" type="submit" value="S'inscrire"  >
      <div class="error">
        <?php if ($valueError){
          echo "Votre mot de passe ou identifiant est mauvais";
        }?>
      </div>
    </form>
    <a href="index.php">Se connecter</a>
  </div>
</body>
</html>