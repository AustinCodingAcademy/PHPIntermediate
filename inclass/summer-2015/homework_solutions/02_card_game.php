<?php
//<div style="font-size: 5em; color:red;">&diam;</div>
//<div style="font-size: 5em; color:red;">&spades;</div>
//<div style="font-size: 5em; color:black;">&clubs;</div>
//<div style="font-size: 5em; color:red;">&hearts;</div>

/**
 * This will return a deck of cards
 * @return array
 */
function getDeck()
{
    /** @var array $deck My Deck of cards */
    $deck = [];

    $suites = [
        'Diamond' => '&diams;',
        'Heart' => '&hearts;',
        'Club' => '&clubs;',
        'Spade' => '&spades;'
    ];
    $ranks = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

    // Loop through all the suites
    foreach ($suites as $suite => $color) {

        foreach ($ranks as $rank) {

            // Create a card?
//            $deck[] = $suite . '-' . $rank;

            // Using the function
            $deck[] = colorizeCard($suite, $color, $rank);
        }
    }

    // Make it happen :)
    // Hint, use two nested loops.

    return $deck;
}


/**
 * Colorize the card
 * @param string $suite English name of the suite
 * @param string $htmlSuite HTML Entity icon
 * @param string $rank The numeric or alpha-numeric rank
 * @return string
 */
function colorizeCard($suite, $htmlSuite, $rank)
{
    $color = ($suite == 'Diamond' || $suite == 'Heart') ? 'red' : 'black';

    return "<div style=\"font-size: 5em; color:$color;\">$htmlSuite$rank</div>";
}

// Using the deck function
$myDeck = getDeck();
echo 'Number of cards in deck: ' . count($myDeck) . '<br/>';
echo '<pre>';
print_r($myDeck);