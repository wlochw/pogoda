<?php

include_once 'vendor/autoload.php';

use Symfony\Component\Stopwatch\Stopwatch;
$stopwatch = new Stopwatch();
$stopwatch->start('eventName');

$url = 'http://api.openweathermap.org/data/2.5/weather?q=London&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
$browser = new Buzz\Browser();
$response = $browser->get($url);


$content = $response->getContent();

$weatherObject = json_decode($content);

// var_dump($weatherObject->main->temp);

echo ('Temperatura w miescie: '. $weatherObject->name . ' wynosi: '. $weatherObject->main->temp . ' stopni Kelwina'. "\xA");
$event = $stopwatch->stop('eventName');
echo('Czas pobierania wyniós³: '. $event->getDuration() . ' ms'. "\xA");
?>