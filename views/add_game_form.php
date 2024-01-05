<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/add_game.css" />
  <title>Game Collection | Ajouter un jeu</title>
</head>
<body>
  <div class="container-form">
    <h1>Ajouter un jeu à sa bibliothèque</h1>
    <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>
    <form method="post">
      <div class="form-group">
        <label for="name">Nom du jeu</label>
        <input type="text" id="name" name="name" placeholder="Nom du jeu" />
      </div>
      <div class="form-group">
        <label for="editor">Editeur du jeu</label>
        <input type="text" id="editor" name="editor" placeholder="Editeur du jeu" />
      </div>
      <div class="form-group">
        <label for="release-date">Sortie du jeu</label>
        <input class="date" type="date" id="release-date" name="release-date" placeholder="Sortie du jeu" />
      </div>
     
      <div class="checkboxes">
        <p>Plateforme : </p>
        <div class="checkbox">
          <input type="checkbox" id="playstation" name="playstation" />
          <label for="playstation">PlayStation</label>
        </div>
        <div class="checkbox">
          <input type="checkbox" id="xbox" name="xbox" />
          <label for="xbox">Xbox</label>
        </div>
        <div class="checkbox">
          <input type="checkbox" id="nintendo" name="nintendo" />
          <label for="nintendo">Nintendo</label>
        </div>
        <div class="checkbox">
          <input type="checkbox" id="pc" name="pc" />
          <label for="pc">PC</label>
        </div>
      </div>

      <div class="form-group">
        <label for="description">Description du jeu</label>
        <textarea id="description" name="description" placeholder="Description du jeu"></textarea>
      </div>  

      <div class="form-group">
        <label for="cover">URL de la cover</label>
        <input type="text" id="cover" name="cover" placeholder="URL de la cover" />
      </div>

      <div class="form-group">
        <label for="site">URL du site</label>
        <input type="text" id="site" name="site" placeholder="URL du site" />
      </div>

      <div class="submit" style="margin-top: 15px;">
        <input type="submit" class="submit"value="Ajouter le jeu">
      </div>

      <div class="error">
        <?php
        if ($valueError){
          echo "Certain champs sont vide";
        }?>
      </div>

    </form>
  </div>
</body>
</html>