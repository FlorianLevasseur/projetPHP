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
            'https://www.jeuxactu.com/rss/multi.rss'
        ],
        'theme' => [
            'News',
            'Tests',
            'Multi'
        ]
    ];
}

$fluxRss = [
    'News' => 'https://www.jeuxactu.com/rss/news.rss',
    'Tests' => 'https://www.jeuxactu.com/rss/tests.rss',
    'Multi' => 'https://www.jeuxactu.com/rss/multi.rss',
    'Android' =>'https://www.jeuxactu.com/rss/android.rss',
    'PC' =>'https://www.jeuxactu.com/rss/pc.rss'
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
        header('Location: accueil');
        exit();
    }

    
}


?>
