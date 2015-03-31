<?php

class Card {

    public function createCard($cardDeck) {

        $color = $cardDeck[rand(0, count($cardDeck))];
        $value = $color[rand(0, count($color))];
        
        

    }

}
