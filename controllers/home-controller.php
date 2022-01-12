<?php
require_once 'functions.php';


$myConfig = getParam();
$array_xml  = getXML($myConfig['fluxRss'], $myConfig['theme'], $myConfig['nbArticles']);
?>