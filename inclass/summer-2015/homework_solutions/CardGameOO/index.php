<?php

require('Card.php');
require('Deck.php');
require('Dealer.php');
require('Person.php');

$dealer = new Dealer(3);
$dealer->addPlayer('Bob')->addPlayer('Cindy')->addPlayer('Maxx');

$dealer->deal();
$dealer->render();