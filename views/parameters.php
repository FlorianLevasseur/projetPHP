<?php
require_once '../controllers/parameters-controller.php';
?>

<!doctype html>

<html lang="fr">

<head>

  <title>Paramètres</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/style/style.css">

</head>

<body>

  <h1 class="red">Paramètres</h1>

  <span class="text-danger"><?= $error ?? '' ?></span>
  
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="darkMode">
    <label class="form-check-label" for="darkMode">Dark Mode</label>
  </div>
  <form method="POST">
    <div>
      <label for="nbArticles">Nombre d'articles affichés sur la page d'accueil :</label>
      <select class="form-select" aria-label="Default select example" name="article">
        <option value="6" <?= $_SESSION['config']['nbArticles'] == 6 ? 'selected' : '' ?>>6</option>
        <option value="9" <?= $_SESSION['config']['nbArticles'] == 9 ? 'selected' : '' ?>>9</option>
        <option value="12" <?= $_SESSION['config']['nbArticles'] == 12 ? 'selected' : '' ?>>12</option>
      </select>
    </div>
    <div class="mt-3">
      <p>Choix des sujets : </p>
      <?php foreach($fluxRss as $key => $value): ?>
      <div>
        <input class="form-check-input" type="checkbox" value="<?= $value ?>" id="flexCheckDefault1" name="<?= $key ?>" <?= in_array($key, $_SESSION['config']['theme']) ? 'checked' : '' ?>>
        <label class="form-check-label" for="flexCheckDefault1">
        <?= $key ?>
        </label>
      </div>
        <?php endforeach; ?>
      <input type="submit" name="submitParam" value="Envoyer">
  </form>



  <script src="../assets/script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>