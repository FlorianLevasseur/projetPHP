<?php
session_start();

if(isset($_COOKIE['param'])){
    $arrayCookie = json_decode($_COOKIE['param']);
    $_SESSION['config'] = [
        'nbArticles' => $arrayCookie->nbArticles,
        'fluxRss' => $arrayCookie->fluxRss,
        'theme' => $arrayCookie->theme
    ];
}

if (!isset($_SESSION['config'])) {
    $_SESSION['config'] = [
        'nbArticles' => 9,
        'fluxRss' => [
            'https://www.jeuxactu.com/rss/news.rss',
            'https://www.jeuxactu.com/rss/tests.rss',
            'https://www.jeuxactu.com/rss/ps5.rss'
        ],
        'theme' => [
            'News',
            'Tests',
            'Ps5'
        ]
    ];
}

$fluxRss = [
    'News' => 'https://www.jeuxactu.com/rss/news.rss',
    'Tests' => 'https://www.jeuxactu.com/rss/tests.rss',
    'Ps5' => 'https://www.jeuxactu.com/rss/ps5.rss',
    'Switch' =>'https://www.jeuxactu.com/rss/switch.rss',
    'Xbox-Series-X' =>'https://www.jeuxactu.com/rss/xbox-series-x.rss'
];

if(!empty($_POST)){

    $arrayLink = [];
    $arrayTheme = [];
    

    foreach($fluxRss as $key => $value){
        if(array_key_exists($key, $_POST)){
            $arrayLink[] = $_POST[$key];
            $arrayTheme[] = $key;
        }
    }

    if(count($arrayLink) != 3){
        $error = 'Selectionnez trois flux rss';
    }else{
        $_SESSION['config'] = [
            'nbArticles' => $_POST['article'],
            'fluxRss' => $arrayLink,
            'theme' => $arrayTheme
            ];
        setcookie("param", json_encode($_SESSION['config']), time()+60*60*24*30, "/");
        header('Location: home.php');
        exit();
    }

    
}


?>
