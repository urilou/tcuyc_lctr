<?php
require_once(dirname(__FILE__) . "/EasyBotter.php");
$eb = new EasyBotter();

$response = $eb->autoFollow();
$response = $eb->postRotation("cancel-new.txt");
$response = $eb->postRotation("extra-new.txt");

$response = $eb->postRotation("blueline.txt");
$response = $eb->postRotation("denentoshi.txt");
//$response = $eb->reply(5,"",dirname(__FILE__)."/debugreply.php");

?>
