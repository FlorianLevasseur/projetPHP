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
function getXML(array $fluxRss, array $theme, int $nbArticles)
{
    $arrayMultiXML = [];
    $arrayDisplayXML = [];

    foreach($fluxRss as $value){
        $arrayMultiXML[] = simplexml_load_file($value)->channel->item;
    }


    [$xml1, $xml2, $xml3] = $arrayMultiXML;

    for($i=0; $i < $nbArticles / 3; $i++)
    {
        $xml1[$i]->color = 'red';
        $xml2[$i]->color = 'blue';
        $xml3[$i]->color = 'yellow';

        $xml1[$i]->flux = $theme[0];
        $xml2[$i]->flux = $theme[1];
        $xml3[$i]->flux = $theme[2];

        $xml1[$i]->date = $xml1[$i]->children('dc', true)->date;
        $xml2[$i]->date = $xml2[$i]->children('dc', true)->date;
        $xml3[$i]->date = $xml3[$i]->children('dc', true)->date;

        $arrayDisplayXML['flux'][] = $xml1[$i];
        $arrayDisplayXML['flux'][] = $xml2[$i];
        $arrayDisplayXML['flux'][] = $xml3[$i];

        if($i == 0){
        $arrayDisplayXML['image'][] = $xml1[$i];
        $arrayDisplayXML['image'][] = $xml2[$i];
        $arrayDisplayXML['image'][] = $xml3[$i];
        }
    }

    usort($arrayDisplayXML['flux'], 'dateCompare');
    usort($arrayDisplayXML['image'], 'dateCompare');
    $arrayDisplayXML['flux'] = array_reverse($arrayDisplayXML['flux']);
    $arrayDisplayXML['image'] = array_reverse($arrayDisplayXML['image']);

    return $arrayDisplayXML;
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