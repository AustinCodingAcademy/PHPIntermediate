<?php

class Card
{
    protected static $allowedSuites = array('D', 'H', 'S', 'C');

    /**
     * @return array
     */
    public static function getAllowedSuites()
    {
        return self::$allowedSuites;
    }

    public static function getSuites()
    {
        return self::$allowedSuites;
    }
}


//$card = new Card();
$suites = $card->getAllowedSuites();
//$suites = $card->getAllowedSuites();
//$suites = Card::

echo '<pre>';
print_r($suites);