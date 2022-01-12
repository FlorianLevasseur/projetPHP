<?php
require_once '../controllers/pages-controller.php';
?>

<!doctype html>

<html lang="fr">

<head>

  <title>Article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/style/style.css">

</head>

<body>
  <div class="text-center">
    <a href="/"><img class="img-fluid" src="../assets/img/Logo.png" alt="Logo du site"></a>
  </div>
  <h1 class="text-center"><?= ucfirst($_GET['cat']) ?></h1>
  <div class="row p-0 mx-0">
    <?php foreach ($myXml->channel->item as $value) { ?>
      <div class="col-lg-3 d-flex align-items-stretch">
        <div class="card mb-2 border border-dark">
          <img src="<?= $value->enclosure['url'] ?>" class="img-fluid">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $value->title ?></h5>
            <p class="card-text"><?= $value->description ?></p>
            <p class="card-text"><u><?= utf8_encode(strftime("%A %d %B %G, %H:%M", strtotime($value->children('dc', true)->date))) ?></u></p>
            <div class="text-end mt-auto">
              <a href="<?= $value->link ?>" class="btn btn-danger">Aller vers l'article</a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <footer>
    <nav class="navbar navbar-light bg-light" id="myNavbar">
      <div class="container-fluid">
        <a class="navbar-brand <?= $_GET['cat'] == strtolower($myConfig['theme'][0]) ? 'text-danger' : '' ?>" href="<?= strtolower($myConfig['theme'][0]) ?>"><?= $myConfig['theme'][0] ?></a>
        <a class="navbar-brand <?= $_GET['cat'] == strtolower($myConfig['theme'][1]) ? 'text-danger' : '' ?>" href="<?= strtolower($myConfig['theme'][1]) ?>"><?= $myConfig['theme'][1] ?></a>
        <a class="navbar-brand <?= $_GET['cat'] == strtolower($myConfig['theme'][2]) ? 'text-danger' : '' ?>" href="<?= strtolower($myConfig['theme'][2]) ?>"><?= $myConfig['theme'][2] ?></a>
        <a class="navbar-brand" href="parametres"><i class="bi bi-gear-fill"></i></a>
      </div>
    </nav>
  </footer>

  <script src="../assets/script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>