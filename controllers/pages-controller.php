<?php
session_start();

$myXml = simplexml_load_file("https://www.jeuxactu.com/rss/" . strtolower($_GET['cat']) . ".rss"); 
?>