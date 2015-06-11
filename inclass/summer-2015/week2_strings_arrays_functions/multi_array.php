<?php

// Assoc array
$personHands = [];

$people = array('joe', 'mike', 'ann');

foreach ($people as $person) {

    // Get n cards from deck
    $cardsFromDeck = ['AH', '10C', '3S'];

    $personHands[$person] = $cardsFromDeck;
}

echo '<pre>';
print_r($personHands);