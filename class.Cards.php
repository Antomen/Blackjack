<?php
session_start();
class Cards {

    public function createCards() {

        $color = rand(0, count($_SESSION["deck"]) - 1);
        //$colorDeck = $_SESSION["deck"][$color];
        $kortPosition = rand(0, count($_SESSION["deck"][$color]) - 1);
        var_dump($kortPosition);
        echo $_SESSION["deck"][$color][$kortPosition];
        $value = array_splice($_SESSION["deck"][$color], $kortPosition, 1 );
//        $value = array_splice($colorDeck, $colorDeck[rand(0, count($colorDeck) - 1)], 1 );

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
        
//        var_dump($colorDeck);

        $card = array($value[0], $color);

        $_SESSION["cards"][] = $card;
        
    }

}
