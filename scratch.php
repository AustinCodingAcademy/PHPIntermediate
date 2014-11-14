<?php

/**
 * Return an array that represents a deck of cards
 *
 * e.g. array(
 *  0 => '1D', // Ace of diamonds
 *  1 => '2D', // 2 of diamonds
 *  ...
 *  11 => '11C' // Jack of clubs
 * )
 *
 * @return array
 */
function getDeck()
{
    $suites = array('D' => '&diams;', 'H' => '&hearts;', 'S' => '&spades;', 'C' => '&clubs;');
    $ranks = array_merge(array('A'), range(2, 10), array('J', 'Q', 'K'));

    $deck = array();
    foreach ($suites as $suite => $suiteColor) {

        foreach ($ranks as $rank) {

            // Diamonds and hearts are red
            if ($suite == 'D' || $suite == 'H') {
                $color = 'red';
            } else { // Spades and clubs are black
                $color = 'black';
            }

            $deck[] = '<span style="color: ' . $color . ';">' . $rank . '' . $suiteColor . '</span>';
        }
    }
    return $deck;
}

/**
 * Shuffle the deck of cards
 *
 * @param array $deck Full deck of cards (passed by ref)
 *
 * @return void
 */
function shuffleDeck(&$deck)
{
    shuffle($deck);
}

/**
 * @param array $players      An array of player names
 * @param int   $numCards     How many cards to give each player
 * @param array $shuffledDeck A shuffled deck of cards
 *
 * @return array
 */
function deal($players, $numCards, &$shuffledDeck)
{
    /** @var array $playersHands This is the array we will construct and return that has the hands we deal */
    $playersHands = array();

    foreach($players as $player){

        /** @var array $playerCards Of cards that each player will get */
        $playerCards = array();

        foreach($shuffledDeck as $key => $card){

            // Give a card to the player
            $playerCards[] = $card;

            // Remove the given card from the deck
            unset($shuffledDeck[$key]);

            // If we have given the player the number of cards they need
            // break out of the loop
            if(sizeof($playerCards) == $numCards){
                break;
            }
        }

        // Assign the hand to the player
        $playersHands[$player] = $playerCards;
    }
    return $playersHands;
}


// ----------- USAGE -----------------

echo '<pre>';
// Crack open a brand new deck of cards
$deck = getDeck();

// Shuffle the deck
shuffleDeck($deck);

echo 'Deck after shuffling, but before dealing: <br/>';
print_r($deck);

$players = array('Joe', 'Mary', 'Zim', 'Samir', 'Ryan');
$numCards = 4;

$playerHands = deal($players, $numCards, $deck);

echo 'Hands each player has: <br/>';
print_r($playerHands);

echo 'Deck has '.sizeof($deck).' cards after dealing: <br/>';
print_r($deck);
echo '<pre>';