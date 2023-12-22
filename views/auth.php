<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css" />
  <title>Game Collection | Se connecter</title>
</head>
<body>
  <div class="container">
    <h1>Se connecter a Game Collection</h1>
    <form action="index.php" method="post">
      <div class="input">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="input top" style="margin-top: 15px;">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>  
      </div>
      <input class="submit" type="submit" value="Se connecter">

      <div class="error">
        <?php if ($valueError){
          echo "Votre mot de passe ou identifiant est mauvais";
        }?>
      </div>
     
    </form>
    <a href="register">S'inscrire</a>
  </div>
</body>
</html>