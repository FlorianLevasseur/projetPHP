<?php
session_start();

if (!isset($_SESSION['config'])) {
    $_SESSION['config'] = [
        'nbArticles' => 9,
        'fluxRss' => [
            'https://www.jeuxactu.com/rss/news.rss',
            'https://www.jeuxactu.com/rss/tests.rss',
            'https://www.jeuxactu.com/rss/ps5.rss'
        ]
    ];
}

$xml = simplexml_load_file($_SESSION['config']['fluxRss'][0]);
$xml2 = simplexml_load_file($_SESSION['config']['fluxRss'][1]);
$xml3 = simplexml_load_file($_SESSION['config']['fluxRss'][2]);

$firstArticle = $xml->channel->item;
$secondArticle = $xml2->channel->item;
$thirdArticle = $xml3->channel->item;
var_dump($firstArticle);

foreach($xml->channel->item as $value){
    // echo $value->title;
}