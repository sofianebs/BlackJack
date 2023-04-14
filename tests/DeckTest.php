<?php 
namespace Tests\Blackjack;

use Blackjack\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testCardsLeftReturnsCorrectValue()
    {
        $deck = new Deck();
        $this->assertSame(52, $deck->cardsLeft());

        for ($i = 0; $i < 10; $i++) {
            $deck->drawCard();
        }
        $this->assertSame(42, $deck->cardsLeft());

        for ($i = 0; $i < 42; $i++) {
            $deck->drawCard();
        }
        $this->assertSame(0, $deck->cardsLeft());
    }

    public function testDrawCardReturnsCard()
    {
        $deck = new Deck();
        $card = $deck->drawCard();
        $this->assertInstanceOf('Blackjack\Card', $card);
    }

    public function testShuffleChangesOrderOfCards()
    {
        // Create two decks with the same cards
        $deck1 = new Deck();
        $deck2 = new Deck();
        $this->assertSame($deck1->cardsLeft(), $deck2->cardsLeft());

        // Shuffle one of the decks
        $deck1->shuffle();

        // Assert that the order of the cards is different
        $cards1 = [];
        $cards2 = [];
        while ($deck1->cardsLeft() > 0) {
            $cards1[] = $deck1->drawCard();
            $cards2[] = $deck2->drawCard();
        }
        $this->assertNotEquals($cards1, $cards2);
    }
}