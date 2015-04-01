<?php

class Cards {

    public function createCards($cardDeck) {

        $tmp = rand(0, count($cardDeck)-1);
        $tmpDeck = $cardDeck[$tmp];
        $value = $tmpDeck[rand(0, count($tmpDeck)-1)];
        
        return array($tmp, $value);

    }

}
