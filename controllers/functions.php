<?php

$fluxRss = [
                'News'          =>'https://www.jeuxactu.com/rss/news.rss',
                'Tests'         =>'https://www.jeuxactu.com/rss/tests.rss',
                'Multi'         =>'https://www.jeuxactu.com/rss/multi.rss',
                'Android'       =>'https://www.jeuxactu.com/rss/android.rss',
                'PC'            =>'https://www.jeuxactu.com/rss/pc.rss'
];

$nbArticles = [6, 9, 12];

/**
 * 
 */
function getXML(array $fluxRss, array $theme, int $nbArticles) : array
{
    $arrayMultiXML = [];
    $arrayDisplayXML = [];
    $color = ['red', 'blue', 'yellow'];

    foreach($fluxRss as $value){
        $arrayMultiXML[] = simplexml_load_file($value)->channel->item;
    }

    foreach($arrayMultiXML as $key => $value){

        $i = 0;

        foreach($value as $elt){

            if($i < $nbArticles / 3){

                $elt->color = $color[$key];
                $elt->flux = $theme[$key];
                $elt->date = $elt->children('dc', true)->date;
                $arrayDisplayXML['flux'][] = $elt;
                if($i == 0) $arrayDisplayXML['image'][] = $elt;
                $i++;
            }
        }
    }

    $arrayDisplayXML['flux'] = sortDate($arrayDisplayXML['flux']);
    $arrayDisplayXML['image'] = sortDate($arrayDisplayXML['image']);

    return $arrayDisplayXML;
}


/**
 * 
 */
function sortDate(array $displayFlux) : array
{
    usort($displayFlux, 'dateCompare');
    return array_reverse($displayFlux);
}



/**
 * 
 */
function dateCompare($a, $b) : int
{
    return strtotime($a->date) - strtotime($b->date);
}



/**
 * 
 */
function getParam() : array
{
    setlocale(LC_TIME, "fr_FR", "French");
    date_default_timezone_set('Europe/Paris');

    if(isset($_COOKIE['param']))
    {
        $arrayCookie = json_decode($_COOKIE['param']);
        return [
                                    'nbArticles'    => $arrayCookie->nbArticles,
                                    'fluxRss'       => $arrayCookie->fluxRss,
                                    'theme'         => $arrayCookie->theme ];
    }else{
        return [
                        'nbArticles' => 9,
                        'fluxRss' => ['https://www.jeuxactu.com/rss/news.rss', 'https://www.jeuxactu.com/rss/tests.rss', 'https://www.jeuxactu.com/rss/multi.rss'],
                        'theme' => ['News', 'Tests', 'Multi'] ];
}}



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

    $myConfig = [
                                'nbArticles'    => $_POST['article'],
                                'fluxRss'       => $_POST['checkbox'],
                                'theme'         => $theme
    ];

    setcookie("param", json_encode($myConfig), time()+60*60*24*30, "/");
    header('Location: /');
    exit();
}
?>