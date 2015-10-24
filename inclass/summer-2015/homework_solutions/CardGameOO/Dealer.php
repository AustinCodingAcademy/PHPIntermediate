<?php


/**
 * Class Game: The purpose is to get a deck, and deal cards out to players
 */
class Dealer
{
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
        $this->players[] = new Person($playerName);

        return $this;
    }

    public function deal()
    {
        foreach ($this->players as $player) {

            $cards = $this->deck->getSpecifiedNumberOfCards($this->numCardsPerPlayer);

            foreach ($cards as $card) {
                $player->giveCard($card);
            }
        }
    }

    /**
     * Display all players and their cards
     * @return void
     */
    public function render()
    {
        foreach ($this->players as $player) {

            echo '<h3>' . $player->getName() . '</h3>';

            $hand = $player->getHand();

            foreach ($hand as $card) {
                echo $card->render();
            }

            echo '<hr/>';
        }
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