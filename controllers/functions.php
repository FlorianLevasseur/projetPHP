<?php

// MyConfig -- Flux RSS Autorisés

$fluxRss = [
                'News'          =>'https://www.jeuxactu.com/rss/news.rss',
                'Tests'         =>'https://www.jeuxactu.com/rss/tests.rss',
                'Multi'         =>'https://www.jeuxactu.com/rss/multi.rss',
                'Android'       =>'https://www.jeuxactu.com/rss/android.rss',
                'PC'            =>'https://www.jeuxactu.com/rss/pc.rss'
];

$nbArticles = [6, 9, 12];

// Fin de MyConfig

/**
 * 
 */
function getXML(array $arrayXML) : array
{
    $arrayMultiXML = [];
    foreach($arrayXML as $value){
        $arrayMultiXML[] = basename($_SERVER['PHP_SELF']) == 'home.php' ? simplexml_load_file($value)->channel->item : simplexml_load_file($value)->channel;
    }
    return $arrayMultiXML;
}


/**
 * 
 */
function dateCompare($a, $b)
{
    $t1 = strtotime($a->date);
    $t2 = strtotime($b->date);
    return $t1 - $t2;
}  

/**
 * 
 */
function setParam(array $fluxRss, array $nbArticles) : string
{
    if(!isset($_POST['checkbox']))                      return "Aucun sujet sélectionné";
    if((int) count($_POST['checkbox']) != 3)            return "Veuillez sélectionner 3 flux RSS";
    if(!in_array($_POST['article'], $nbArticles))       return "Veuillez sélectionner un nombre d'article dans la liste";
    
    foreach($_POST['checkbox'] as $value)
    {
        if(!in_array($value, $fluxRss))                 return "Le flux RSS n'est pas valide";
    }


    $theme = array_map(function ($element) {
        return $element = ucfirst(explode(".", explode("/", $element)[4])[0]);
    }, $_POST['checkbox']);

    $_SESSION['config'] = [
                                'nbArticles'    => $_POST['article'],
                                'fluxRss'       => $_POST['checkbox'],
                                'theme'         => $theme
    ];

    setcookie("param", json_encode($_SESSION['config']), time()+60*60*24*30, "/");
    header('Location: /');
    exit();
}


/**
 * 
 */
function getParam() : void
{
    session_start();
    setlocale(LC_TIME, "fr_FR", "French");
    date_default_timezone_set('Europe/Paris');


    if(isset($_COOKIE['param']) && !isset($_SESSION['config'])){

        $arrayCookie = json_decode($_COOKIE['param']);

        $_SESSION['config'] = [
                                    'nbArticles'    => $arrayCookie->nbArticles,
                                    'fluxRss'       => $arrayCookie->fluxRss,
                                    'theme'         => $arrayCookie->theme
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
            'theme' => ['News', 'Tests', 'Multi']
        ];
    }
}

?>