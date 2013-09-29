<?php
require_once(dirname(__FILE__) . "/EasyBotter.php");
$eb = new EasyBotter();

$response = $eb->reply(5,"",dirname(__FILE__)."/weatherreply.php");

if(date("G") == 8 && date("i") == 00 ){
    $response = $eb->postRotation("weather.txt");
}

if(date("G") == 13 && date("i") == 00 ){
    $response = $eb->postRotation("weathernoon.txt");
}
?>
