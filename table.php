<?php
include "class.Cards.php";

$cards = new Cards();

$cardDeck = array(
    $heart = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"),
    $diamonds = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"),
    $clover = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"),
    $spades = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace")
);

if (isset($_GET["action"])) {

    if ($_GET["action"] == "HIT") {

        $card = $cards->createCards($cardDeck);

        //fix: uppdateras
        
        foreach($card as $i){
        echo $i . " ";
        }
    }

    if ($_GET["action"] == "STAND") {
        
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blackjack</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>

        <div class="bord">

            <div class="player">
                <form method="GET">
                    <input type="submit" name="action" value="HIT">
                    <input type="submit" name="action" value="STAND">
                </form>    
            </div>

            <div class="dealer">

            </div>
        </div>
    </body>
</html>