<?php
session_start();

$myXml = simplexml_load_file("https://www.jeuxactu.com/rss/" . strtolower($_GET['cat']) . ".rss"); 

var_dump($myXml);

$fluxRss = [
    'News' => 'https://www.jeuxactu.com/rss/news.rss',
    'Tests' => 'https://www.jeuxactu.com/rss/tests.rss',
    'Ps5' => 'https://www.jeuxactu.com/rss/ps5.rss',
    'Switch' =>'https://www.jeuxactu.com/rss/switch.rss',
    'Xbox-Series-X' =>'https://www.jeuxactu.com/rss/xbox-series-x.rss'
];

?>