<?php
session_start();

$fluxRss = [
    'News' => 'https://www.jeuxactu.com/rss/news.rss',
    'Tests' => 'https://www.jeuxactu.com/rss/tests.rss',
    'Ps5' => 'https://www.jeuxactu.com/rss/ps5.rss',
    'Switch' =>'https://www.jeuxactu.com/rss/switch.rss',
    'Xbox-Series-X' =>'https://www.jeuxactu.com/rss/xbox-series-x.rss'
];

if(!empty($_POST)){

    $arrayLink = [];

    foreach($fluxRss as $key => $value){
        if(array_key_exists($key, $_POST)){
            $arrayLink[] = $_POST[$key]; 
        }
    }

    if(count($arrayLink) != 3){
        $error = 'Selectionnez trois flux rss';
    }else{
        $_SESSION['config'] = [
            'nbArticles' => $_POST['article'],
            'fluxRss' => $arrayLink
            ];
        header('Location: home.php');
        exit();
    }

    
}


?>
