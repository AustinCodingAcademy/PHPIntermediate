<?php


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

        // take it off the end, array_shift() takes it off the beginning
        $card = array_pop($this->cards);

        if (empty($card)) {
            throw new \Exception('I ran out of cards!');
        }

        return $card;
    }

    /**
     * Return a specified number of cards from the deck
     * @param int $numCards How many cards to get?
     * @return Card[]
     */
    public function getSpecifiedNumberOfCards($numCards)
    {
        $cards = [];
        for ($i = 0; $i < $numCards; $i++) {
            $cards[] = $this->getCard();
        }

        return $cards;
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