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
    protected $suite;

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
     * @param string $suite
     * @param string $rank
     * @throws Exception
     */
    public function __construct($suite, $rank)
    {
        $this->suite = $suite;
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
     * Check to see if the suite is valid?
     * @throws Exception
     * @return void
     */
    protected function checkSuite()
    {
        if (!in_array($this->suite, $this->allowedSuites)) {

            throw new Exception(
                $this->suite . ' is not allowed! You can pass: ' .
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
        if ($this->suite == 'Heart' || $this->suite == 'Diamond') {
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
