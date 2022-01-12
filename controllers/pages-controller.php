<?php
require_once 'functions.php';


$myConfig = getParam();
$myXml = simplexml_load_file("https://www.jeuxactu.com/rss/" . strtolower($_GET['cat']) . ".rss"); 
?>