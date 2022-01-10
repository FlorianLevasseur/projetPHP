<?php
session_start();

$fluxRss = [
    'News' => 'https://www.jeuxactu.com/rss/news.rss',
    'Tests' => 'https://www.jeuxactu.com/rss/tests.rss',
    'Ps5' => 'https://www.jeuxactu.com/rss/ps5.rss',
    'Switch' =>'https://www.jeuxactu.com/rss/switch.rss',
    'Xbox-Series-X' =>'https://www.jeuxactu.com/rss/xbox-series-x.rss'
];

var_dump($_POST);
if(!empty($_POST)){

    $arrayLink = [];

    foreach($fluxRss as $key => $value){
        if(array_key_exists($key, $_POST)){
            $arrayLink[] = $_POST[$key]; 
        }
    }

    $_SESSION['config'] = [
        'nbArticles' => $_POST['article'],
        'fluxRss' => $arrayLink
        ];

}

var_dump($_SESSION);


?>
