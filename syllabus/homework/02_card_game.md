##### Homework 02 - Card Game

Today we are being asked to write a few functions that will help some of our other team members create a card game they are working on. 
Create the following functions
- ```getDeck()``` - Returns an array of cards in a deck
- ```shuffleDeck(&$deck)``` - Shuffle a deck of cards
- ```deal($players, $numCards, &$shuffledDeck)``` - Deal a certain number of cards out to each player from the given deck

Sample cards: 
- ```A-D``` Ace of Diamonds
- ```4-H``` 4 of Hearts 
- ```J-S``` Jack of Spades
- ```K-C``` King of Clubs

The ```shuffleDeck``` function will not return the a new shuffled array containing the shuffled deck, that would not make sense, because that would mean we now have two decks not one.  
Since the value ```$deck``` is passed to ```shuffleDeck``` by reference, the variable will be mutated outside the function scope, and we will still be left with only one deck.

When the ```deal``` function is called, each player will get the number of cards indicated by the ```$numCards``` argument. 
Once a card has been given to the player, it should no longer be available in the deck, neither should any other player have the ability to get the same card. 

The return value from the deal function will be an ```associative``` array, whose key will be the player name, and whose value will be an array of cards they have been dealt. 

In the sample code provided, under the usage section, we only created three players with three cards each. What happens if the number of players increased to 15? 
How would your function react if it did not have enough cards to deal? 
We don't expect you to solve this edge case, but if you do come across an elegant solution, be sure to share it with us. Think of how a real dealer would react to this problem.

HTML entities for suite icons:
- Diamonds ```&diams;```
- Hearts ```&hearts;```
- Spades ```&spades;```
- Clubs ```&clubs;```

While this is not required, you may substitute the character representations of suite D, H, S, C with their iconic representations, so it looks nicer in the browser. 
You may also color code the output, for the browser. Spades and Clubs are black while Hearts and Diamonds are red.

You may also enclose any ```print_r()``` statement in ```<pre>print_r($arrayToPrint)</pre>``` so your data structure is *pre-formatted* for the browser and is pleasant to look at.

```php
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

}


// ----------- USAGE -----------------

// Crack open a brand new deck of cards
$deck = getDeck();

// Shuffle the deck
shuffleDeck($deck);

echo 'Deck after shuffling, but before dealing: <br/>';
print_r($deck);

$players = array('Joe', 'Mary', 'Zim');
$numCards = 3;

$playerHands = deal($players, $numCards, $deck);

echo 'Hands each player has: <br/>';
print_r($playerHands);

echo 'Deck after dealing: <br/>';
print_r($deck);
```