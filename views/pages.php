<?php
require_once '../controllers/pages-controller.php';
?>

<!doctype html>

<html lang="fr">
  <head>

    <title>Article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/style.css">

  </head>

  <body>
      
    <h1><?= $_GET['cat'] ?></h1>
    <?php
    foreach($myXml as $value) {
      var_dump($value);
    }
    ?>
    <div class="row m-0 p-0 border border-white">
      <div class="col-4">
        <img src="#" class="img-fluid">
      </div>
      <div class="col-8">
        <p class="h3 my-2">Titre</p>
        <p>Description</p>
        <p>Date</p>
        <div class="text-end">
          <a href="#" class="btn btn-danger">Aller vers l'article</a>
        </div>
      </div>
    </div>


    <script src="../assets/script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>