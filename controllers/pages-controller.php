<?php

setlocale(LC_TIME, "fr_FR", "French");
date_default_timezone_set('Europe/Paris');

session_start();

$myXml = simplexml_load_file("https://www.jeuxactu.com/rss/" . strtolower($_GET['cat']) . ".rss"); 
?>