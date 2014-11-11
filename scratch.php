<?php

class Weather
{
    /**
     * @param float $temperature Temperature in fahrenheit
     * @param string $location City name
     */
    public function __construct($temperature, $location = 'Austin')
    {
        if ($temperature > 80) {
            echo "It is super hot in $location";
        } else {
            echo "Its really cold in $location";
        }
    }
}

$EastWeather = new Weather(88.50, 'Bombay'); // Outputs: It is super hot in Bombay
$NorthWeather = new Weather(60.34, 'Alaska'); // Outputs: Its really cold in Alaska

echo get_class($EastWeather); // Weather

if($EastWeather instanceof Weather){
    echo 'Yep its a Weather object';
}else{
    echo 'Nope its not a Weather object';
}
