<?php

/**
 * Class Card represents a single playing card
 */
class Card
{
    /**
     * Allowed suite characters
     * @var array
     */
    private $allowedSuites = array('D', 'H', 'S', 'C');

    /**
     * Suite of card
     * e.g D, H, S, C
     *
     * @var string
     */
    protected $suite;

    /**
     * Rank of card
     * e.g. A, 2, 3..... J, K Q
     *
     * @var string
     */
    protected $rank;

    /**
     * Color of this card, depending on the suite
     * Spades and Clubs are black while Hearts and Diamonds are red
     * @var string
     */
    protected $color;

    /**
     * HTML entity iconic representation of this suite
     * @var string
     */
    protected $icon;

    /**
     * @param string $rank Rank of this card
     * @param string $suite Single character suite of this card
     * @throws Exception
     */
    public function __construct($rank, $suite)
    {
        // Assign them to the local object properties
        $this->rank = $rank;
        $this->suite = $suite;

        $this->validateData();

        // Color this card
        $this->assignColor();

        // Give it an icon
        $this->assignIcon();
    }

    /**
     * Validate data
     * @throws Exception
     * @return void
     */
    protected function validateData()
    {
        // Ensure that the suite the client passed in is a valid one
        if (!in_array($this->suite, $this->allowedSuites)) {
            throw new Exception('Cannot create a card because suite, ' . $this->suite . ', is invalid!');
        }
    }

    /**
     * Get an HTML rendering for this card
     * @return string
     */
    public function render()
    {
        return '<span style="color:' . $this->color . '; border: 1px solid ' . $this->color . ';">'
        . $this->rank
        . $this->icon
        . '</span>';
    }

    /**
     * Assign the appropriate color to this card
     * @return void
     */
    protected function assignColor()
    {
        // If the Suite is Diamond or a Heart the color is red
        // Otherwise the color is black

        if ($this->suite == 'D' || $this->suite == 'H') {
            $this->color = "Red";
        } else {
            $this->color = 'Black';
        }

        if (in_array($this->suite, array('D', 'H'))) {
            $this->color = "Red";
        } else {
            $this->color = "Black";
        }

        $this->color = in_array($this->suite, array('D', 'H')) ? "Red" : "Black";
    }

    /**
     * Assign the appropriate HTML entity icon to this card
     * @return void
     */
    protected function assignIcon()
    {
        switch ($this->suite) {

            case 'D':
                $this->icon = '&diams;';
                break;

            case 'H':
                $this->icon = '&hearts;';
                break;

            case 'C':
                $this->icon = '&clubs;';
                break;

            case 'S':
                $this->icon = '&spades;';
                break;
        }
    }
}

class Deck
{
    /**
     * @var Card[]
     */
    protected $cards = [];

    /**
     * @var array
     */
    protected $suites = array('D', 'H', 'C', 'S');

    /**
     * @var array
     */
    protected $ranks = array('A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K');

    public function __construct()
    {
        $this->createDeck();
    }

    /**
     * Create a deck of cards
     * @return void
     */
    public function createDeck()
    {
        foreach ($this->suites as $suite) {

            foreach ($this->ranks as $rank) {

                $this->cards[] = new Card($rank, $suite);
            }
        }
    }

    /**
     * Shuffle the deck
     * @return void
     */
    public function shuffle()
    {
        shuffle($this->cards);
    }

    /**
     * Get all cards in the deck
     * @return Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Get one card from the Deck.
     * Also ensure that the Deck decrements appropriately
     * @throws Exception
     * @return Card
     */
    public function getCard()
    {
        $this->shuffle();

        // take it off the end, array_shift() takes it off the
        $card = array_pop($this->cards);

        if (empty($card)) {
            throw new \Exception('I ran out of cards!');
        }

        return $card;
    }

    /**
     * How many cards do I have left?
     * @return int
     */
    public function getNumCards()
    {
        return count($this->cards);
    }
}

class Person
{
    /**
     * @var Card[]
     */
    protected $hand = [];

    /**
     * Player's name
     * @var string
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function giveCard(Card $card)
    {
        $this->hand[] = $card;
    }
}

/**
 * Class Game: The purpose is to get a deck, and deal cards out to players
 */
class Dealer
{
    /**
     * Names of players
     * @var array
     */
    protected $playerNames;

    /**
     * @var Person[]
     */
    protected $players;

    /**
     * How many cards each player should get?
     * @var int
     */
    protected $numCardsPerPlayer;

    /**
     * @var Deck
     */
    protected $deck;

    public function __construct($numCardsPerPlayer)
    {
        $this->numCardsPerPlayer = $numCardsPerPlayer;
        $this->deck = new Deck();
        $this->deck->shuffle();
    }

    public function addPlayer($playerName)
    {
        $this->playerNames[] = $playerName;
    }

    public function deal()
    {
        // Need to populate an array of Person[] and assign to the $players property
        foreach($this->playerNames as $playerName){

        }


        // Then we need to give each person some cards
    }

    /**
     * Return an array, whose key is the player name, and whose value is a Card[]
     * @return array
     */
    public function getPlayersAndTheirHands()
    {
        return $this->players;
    }

}

$dealer = new Dealer(3);
$dealer->addPlayer('Bob');
$dealer->addPlayer('Cindy');
$dealer->addPlayer('Maxx');

//$players = $dealer->getPlayersAndTheirHands();
echo '<pre>';
print_r($dealer);


//$deck = new Deck();
//$cards = [];
//for ($i = 0; $i < 60; $i++) {
//
//    $cards[] = $deck->getCard(); //on Card 53, this is going to fail!
//}
//
//echo '<pre>';
//print_r($cards);/


//echo '<pre>';
//$deck = new Deck();
//
//echo 'Num cards in pristine deck:' . $deck->getNumCards();
//
//echo '<br/>';
//
//echo $deck->getCard()->render();
//
//$card2 = $deck->getCard();
//echo $card2->render();
//
//echo $deck->getCard()->render();
//
//echo '<br/>';
//
//echo 'Num cards after dealing a few: ' . $deck->getNumCards();
//
//echo '<br/>';

//
///** @var Card[] $cards */
//$cards = $deck->getCards();
//
//echo 'This is my deck before shuffling';
//foreach ($cards as $card) {
//    echo $card->render() . ' ';
//}
//
//$deck->shuffle();
//
//
//echo '<br/>';
///** @var Card[] $cards */
//$cards = $deck->getCards();
//
//echo 'This is my deck AFTER shuffling';
//foreach ($cards as $card) {
//    echo $card->render() . ' ';
//}
