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

$array_xml = [];

for($i=0; $i < $_SESSION['config']['nbArticles'] / 3; $i++) {
    $xml->channel->item[$i]->color = 'red';
    $array_xml[] = $xml->channel->item[$i];
    $xml2->channel->item[$i]->color = 'blue';
    $array_xml[] = $xml2->channel->item[$i];
    $xml3->channel->item[$i]->color = 'yellow';
    $array_xml[] = $xml3->channel->item[$i];
}

// var_dump($array_xml);

foreach ($array_xml as $key => $value) {
    var_dump($value);
}

$firstArticle = $xml->channel->item;
$secondArticle = $xml2->channel->item;
$thirdArticle = $xml3->channel->item;

foreach($xml->channel->item as $value){
    // var_dump($value);
    // echo $value->title;
}