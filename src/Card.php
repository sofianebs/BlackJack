<?php
namespace Blackjack;
class Card
{
    const HEARTS = 'coeur';
    const DIAMONDS = 'carreau';
    const CLUBS = 'trefle';
    const SPADES = 'pique';

    private $suit;
    private $value;

    public function __construct(string $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function toString(): string
    {
        switch ($this->value) {
            case 1:
                return "As de {$this->suit}";
            case 11:
                return "Valet de {$this->suit}";
            case 12:
                return "Dame de {$this->suit}";
            case 13:
                return "Roi de {$this->suit}";
            default:
                return "{$this->value} de {$this->suit}";
        }
    }
}