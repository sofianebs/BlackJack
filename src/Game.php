<?php
namespace Blackjack;
class Game
{
    private $deck;
    private $julien;
    private $croupier;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->julien = new Player('Julien');
        $this->croupier = new Player('Croupier');
    }

    public function start()
    {
        // Distribuer les cartes initiales
        $this->deck->shuffle();
        $this->julien->receiveCard($this->deck->drawCard());

        $this->julien->receiveCard($this->deck->drawCard());
        $this->croupier->receiveCard($this->deck->drawCard());
        $this->croupier->receiveCard($this->deck->drawCard());

        // Déterminer si l'un des joueurs a un blackjack
        if ($this->julien->getScore() === 21) {
            echo "Julien gagne avec un blackjack !\n";
            return;
        }
        if ($this->croupier->getScore() === 21) {
            echo "Le croupier gagne avec un blackjack !\n";
            return;
        }

        // Laisser Julien tirer les cartes
        while ($this->julien->getScore() < 17) {
            $this->julien->receiveCard($this->deck->drawCard());
            if ($this->julien->getScore() > 21) {
                echo "Julien a dépassé 21 et a perdu.\n";
                return;
            }
        }

        // Laisser le croupier tirer les cartes
        while ($this->croupier->getScore() <= $this->julien->getScore()) {
            $this->croupier->receiveCard($this->deck->drawCard());
            if ($this->croupier->getScore() > 21) {
                echo "Le croupier a dépassé 21 et a perdu.\n";
                return;
            }
        }

        // Déterminer le gagnant
        $julienScore = $this->julien->getScore();
        $croupierScore = $this->croupier->getScore();
        echo "Score de Julien :" . $julienScore . "\r\n" ; 
        echo "Score de croupier :" . $croupierScore . "\r\n";
        if ($julienScore > $croupierScore) {
            echo "Julien a gagné avec un score de $julienScore contre $croupierScore pour le croupier.\n";
        } elseif ($julienScore < $croupierScore) {
            echo "Le croupier a gagné avec un score de $croupierScore contre $julienScore pour Julien.\n";
        } else {
            echo "Match nul avec un score de $julienScore pour les deux joueurs.\n";
        }
    }
}