<?php

/**
 * Class Card represents and encapsulates data
 * and functionality for a playing card
 */
class Card
{
    /**
     * @var array
     */
    private $allowedSuites = array('Heart', 'Diamond', 'Spade', 'Club');

    /**
     * Heart, Diamond, Spade or Club
     * @var string
     */
    protected $suit;

    /**
     * A, 2-10, J, Q, K
     * @var string
     */
    protected $rank;

    /**
     * Red or black
     * @var string
     */
    protected $color;

    /**
     * This is the HTML icon for the card!
     * @var string
     */
    protected $icon;

    /**
     * @param string $suit
     * @param string $rank
     * @throws Exception
     */
    public function __construct($suit, $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;

        $this->checkSuite();

        $this->colorCard();

        $this->createIcon();
    }

    /**
     * Create a HTML icon for this card
     * @return void
     */
    protected function createIcon()
    {
        
    }

    /**
     * Check to see if the suit is valid?
     * @throws Exception
     * @return void
     */
    protected function checkSuite()
    {
        if (!in_array($this->suit, $this->allowedSuites)) {

            throw new Exception(
                $this->suit . ' is not allowed! You can pass: ' .
                implode(', ', $this->allowedSuites)
            );
        }
    }

    /**
     * Assign a color
     * @return void
     */
    protected function colorCard()
    {
        if ($this->suit == 'Heart' || $this->suit == 'Diamond') {
            $this->color = 'red';
        } else {
            $this->color = 'black';
        }
    }

    /**
     * Render a card for the browser. Its ok to return HTML
     * But in real life you want those concerns to be separated
     * @return string
     */
    public function render()
    {

    }

}
