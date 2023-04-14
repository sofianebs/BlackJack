<?php
namespace Blackjack;
class Deck
{
    private $cards;

    public function __construct()
    {
        $this->cards = [];

        $suits = [Card::HEARTS, Card::DIAMONDS, Card::CLUBS, Card::SPADES];
        $values = range(1, 13);

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $card = new Card($suit, $value);
                $this->cards[] = $card;
            }
        }
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function drawCard(): Card
    {
        return array_pop($this->cards);
    }

    public function cardsLeft(): int
    {
        return count($this->cards);
    }
}