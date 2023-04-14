<?php

use PHPUnit\Framework\TestCase;
use Blackjack\Card;

class CardTest extends TestCase
{
    public function testToStringReturnsCorrectString()
    {
        $card = new Card(Card::HEARTS, 1);
        $this->assertEquals('As de coeur', $card->toString());
        
        $card = new Card(Card::DIAMONDS, 11);
        $this->assertEquals('Valet de carreau', $card->toString());
        
        $card = new Card(Card::CLUBS, 12);
        $this->assertEquals('Dame de trefle', $card->toString());
        
        $card = new Card(Card::SPADES, 13);
        $this->assertEquals('Roi de pique', $card->toString());
        
        $card = new Card(Card::HEARTS, 10);
        $this->assertEquals('10 de coeur', $card->toString());
    }
    
    public function testGetSuitReturnsCorrectSuit()
    {
        $card = new Card(Card::HEARTS, 1);
        $this->assertEquals(Card::HEARTS, $card->getSuit());
        
        $card = new Card(Card::DIAMONDS, 11);
        $this->assertEquals(Card::DIAMONDS, $card->getSuit());
        
        $card = new Card(Card::CLUBS, 12);
        $this->assertEquals(Card::CLUBS, $card->getSuit());
        
        $card = new Card(Card::SPADES, 13);
        $this->assertEquals(Card::SPADES, $card->getSuit());
    }
    
    public function testGetValueReturnsCorrectValue()
    {
        $card = new Card(Card::HEARTS, 1);
        $this->assertEquals(1, $card->getValue());
        
        $card = new Card(Card::DIAMONDS, 11);
        $this->assertEquals(11, $card->getValue());
        
        $card = new Card(Card::CLUBS, 12);
        $this->assertEquals(12, $card->getValue());
        
        $card = new Card(Card::SPADES, 13);
        $this->assertEquals(13, $card->getValue());
    }
}