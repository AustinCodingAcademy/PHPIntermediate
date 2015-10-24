<?php


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

    /**
     * @return Card[]
     */
    public function getHand()
    {
        return $this->hand;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}