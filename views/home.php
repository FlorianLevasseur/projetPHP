<?php
require_once '../controllers/home-controller.php';
?>

<!doctype html>

<html lang="fr">

<head>

  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/style/style.css">

</head>

<body>

  <h1>My Home Page</h1>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= $firstArticle->enclosure['url'] ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?= $firstArticle->title ?></h5>
          <p><?= $firstArticle->description ?></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= $secondArticle->enclosure['url'] ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?= $secondArticle->title ?></h5>
          <p><?= $secondArticle->description ?></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= $thirdArticle->enclosure['url'] ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?= $thirdArticle->title ?></h5>
          <p><?= $thirdArticle->description ?></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= strtolower($_SESSION['config']['theme'][0]) ?>"><?= $_SESSION['config']['theme'][0] ?></a>
      <a class="navbar-brand" href="<?= strtolower($_SESSION['config']['theme'][1]) ?>"><?= $_SESSION['config']['theme'][1] ?></a>
      <a class="navbar-brand" href="<?= strtolower($_SESSION['config']['theme'][2]) ?>"><?= $_SESSION['config']['theme'][2] ?></a>
      <a class="navbar-brand" href="parametres">Paramètres</a>
    </div>
  </nav>
  <table class="table border border-white">
    <tbody id="infoModal">
      <?php foreach ($array_xml as $key => $value) { ?>
        <!-- <?php //$myDate = date_format($value->children('dc', true)->date,'d'); 
              ?> -->
        <tr class="text-white">
          <td width="1%" class="bg<?= $value->color ?>"></td>
          <td width="59%"><?= $value->title ?></td>
          <td width="20%" class="align-middle"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal" data-title="<?= $value->title ?>" data-description="<?= $value->description ?>" data-img="<?= $value->enclosure['url']  ?>" data-link="<?= $value->link ?>" data-time="<?= utf8_encode(strftime("%A %d %B %G, %H:%M", strtotime($value->children('dc', true)->date))) ?>">Loupe</button></td>
          <td width="20%" class="align-middle"><a class="btn btn-danger" href="<?= $value->link ?>">Lien</a></td>

        </tr>
      <?php } ?>

    </tbody>
  </table>


  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header m-auto">

          <p id="titleModal" class="modal-title text-dark text-center h5" id="modalLabel"></p>
        </div>
        <div class="modal-body text-center">
          <img id="imgModal" src="">
        </div>
        <div class="modal-footer">
          <p id="descriptionModal" class="text-dark text-center"></p>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <a id="linkModal" class="btn btn-primary" href="">Aller vers l'article</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/script/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>