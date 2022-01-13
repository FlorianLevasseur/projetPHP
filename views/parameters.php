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
<div class="text-center">
      <a href="/"><img class="img-fluid" src="../assets/img/Logo.png" alt="Logo du site"></a>
    </div>
  <div class="container">
   
    <h1 class="text-center">Paramètres</h1>

    <span class="text-danger"><?= $error ?? '' ?></span>

    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" role="switch" id="darkMode">
      <label class="form-check-label" for="darkMode">Dark Mode</label>
    </div>
    <form method="POST">
      <div>
        <label for="nbArticles">Nombre d'articles affichés sur la page d'accueil :</label>
        <select class="form-select" aria-label="Default select example" name="article">
          <option value="6" <?= $myConfig['nbArticles'] == 6 ? 'selected' : '' ?>>6</option>
          <option value="9" <?= $myConfig['nbArticles'] == 9 ? 'selected' : '' ?>>9</option>
          <option value="12" <?= $myConfig['nbArticles'] == 12 ? 'selected' : '' ?>>12</option>
        </select>
      </div>
      <div class="mt-3">
        <p>Choix des sujets : </p>
        <div class="row m-0 p-0 justify-content-center">
          <?php foreach ($fluxRss as $key => $value) : ?>
            <div class="col-4">
              <div class="card border border-dark text-center py-5 mb-3 bg-white" id="card<?= $key ?>">
                <input class="form-check-input d-none" type="checkbox" value="<?= $value ?>" id="check<?= $key ?>" name="checkbox[]" <?= in_array($value, $myConfig['fluxRss']) ? 'checked' : '' ?>>
                <label class="form-check-label" for="check<?= $key ?>">
                  <?= $key ?>
                </label>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="text-center">
          <input class="btn btn-danger" type="submit" name="submitParam" value="Envoyer">
        </div>
    </form>
  </div>




  <script src="../assets/script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>