<?php 
namespace Blackjack\Tests;

use Blackjack\Card;
use Blackjack\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testReceiveCard()
    {
        $player = new Player('Julien');
        $card = new Card(Card::HEARTS, 7);

        $player->receiveCard($card);
        $this->assertSame([$card], $player->getCards());
    }

    public function testGetScore()
    {
        $player = new Player('Julien');
        $card1 = new Card(Card::HEARTS, 7);
        $card2 = new Card(Card::CLUBS, 5);

        $player->receiveCard($card1);
        $player->receiveCard($card2);
        $this->assertSame(12, $player->getScore());

        $card3 = new Card(Card::SPADES, 1); // Ace
        $player->receiveCard($card3);
        $this->assertSame(13, $player->getScore());

        $card4 = new Card(Card::DIAMONDS, 10); // King
        $player->receiveCard($card4);
        $this->assertSame(23, $player->getScore());
    }
}