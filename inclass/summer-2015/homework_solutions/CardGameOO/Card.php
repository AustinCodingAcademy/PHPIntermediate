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