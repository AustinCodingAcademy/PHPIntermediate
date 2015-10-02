<?php

class PlayingCard
{
    public $suite;

    public $rank;

    public function __construct($s, $r)
    {
        $this->suite = $s;
        $this->rank = $r;
    }
}


$aceOfSpades = new PlayingCard('Spades', 'Ace');

echo '<pre>';
print_r($aceOfSpades);