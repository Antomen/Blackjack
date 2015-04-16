<?php

class Cards {

    public function createCards($cardDeck) {

        $tmp = rand(0, count($cardDeck) - 1);
        $tmpDeck = $cardDeck[$tmp];
        $value = $tmpDeck[rand(0, count($tmpDeck) - 1)];

        $color = $tmp;

        switch ($color) {

            case 0:
                $color = "heart";
                break;

            case 1:
                $color = "diamonds";
                break;

            case 2:
                $color = "clover";
                break;

            case 3:
                $color = "spades";
                break;
        }

        $card = array($value, $color);

        return $card;
    }

}
