<?php
require_once 'functions.php';

getParam();


// Opération de destructuring pour récupérer les objets XML dans plusieurs variables
[$xml1, $xml2, $xml3] = getXML($_SESSION['config']['fluxRss']);

$array_xml = [];

// Construction du tableau de la vue en y ajoutant la date et la couleur
for($i=0; $i < $_SESSION['config']['nbArticles'] / 3; $i++)
{
    $xml1[$i]->color = 'red';
    $xml2[$i]->color = 'blue';
    $xml3[$i]->color = 'yellow';

    $xml1[$i]->date = $xml1[$i]->children('dc', true)->date;
    $xml2[$i]->date = $xml2[$i]->children('dc', true)->date;
    $xml3[$i]->date = $xml3[$i]->children('dc', true)->date;

    $array_xml[] = $xml1[$i];
    $array_xml[] = $xml2[$i];
    $array_xml[] = $xml3[$i];
}


// Permet de trier le tableau final à afficher par ordre décroissant en fonction des dates de publication.
usort($array_xml, 'dateCompare');
$array_xml = array_reverse($array_xml);

?>