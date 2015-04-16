<?php
include "class.Cards.php";
include "print.js";

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
        
        echo $card[0] . " of " . $card[1];

    if ($_GET["action"] == "STAND") {
        
    }
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
                <div class="statistik">

                </div>
                <form method="GET">
                    <input type="submit" name="action" value="HIT">
                    <input type="submit" name="action" value="STAND">
                </form>    
            </div>

            <div class="dealer">

            </div>

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="print.js"></script>

        </div>
    </body>
</html>