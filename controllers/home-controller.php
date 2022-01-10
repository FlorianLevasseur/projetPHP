<?php
session_start();


$xml = simplexml_load_file('https://www.jeuxactu.com/rss/tests.rss');



foreach($xml->channel->item as $value){
    echo $value->title;
}