<?php
require_once 'functions.php';


$myConfig = getParam();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $error = setParam($fluxRss, $nbArticles);
}
?>