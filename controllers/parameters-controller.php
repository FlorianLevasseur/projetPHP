<?php
require_once 'functions.php';

getParam();


[$news, $tests, $multi, $android, $pc] = getXML($fluxRss);
// Si tu veux des infos sur une catégorie (ex: $news->title retourne /// public 'title' => string 'Toutes les News JeuxActu.com')

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $error = setParam($fluxRss, $nbArticles);
}


?>
