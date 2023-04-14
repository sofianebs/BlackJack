<?php
namespace Blackjack;
class Player
{
    private $name;
    private $cards;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->cards = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function receiveCard(Card $card)
    {
        $this->cards[] = $card;
        $this->showcard($card);
        
    }
    public  function showcard($card){
        echo $this->name . ' a eu la carte : ' . $card->toString() ."\r\n" ;  ; 
    }
    public function getCards(): array
    {
        return $this->cards;
    }

    public function getScore(): int
    {
        $score = 0;
        $aces = 0;

        foreach ($this->cards as $card) {
            $value = $card->getValue();
            if ($value === 1) {
                $aces++;
                $score += 11;
            } elseif ($value > 10) {
                $score += 10;
            } else {
                $score += $value;
            }
        }

        while ($score > 21 && $aces > 0) {
            $score -= 10;
            $aces--;
        }

        return $score;
    }
}