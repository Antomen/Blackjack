<?php
include "class.Cards.php";

$cards = new Cards();


if (!isset($_SESSION["deck"])) {

    $_SESSION["deck"] = array(
        $heart = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"),
        $diamonds = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"),
        $clover = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"),
        $spades = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace")
    );
}

if (isset($_GET["action"])) {

    if ($_GET["action"] == "HIT") {

        $cards->createCards();

//        $_SESSION["cards"][] = $card; 

//        var_dump($_SESSION);
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
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>

        <div class="bord">

            <div class="player">
                <div class="statistik">
                    <?php
                    var_dump($_SESSION["cards"]);
                    var_dump($_SESSION["deck"]);
                    foreach ($_SESSION["cards"] as $card) {
                        
                            echo $card[0] . " of " . $card[1] . "<br>";
                        
                    }
                    ?>
                </div>

                <br>

                <form method="GET">
                    <input type="submit" name="action" value="HIT">
                    <input type="submit" name="action" value="STAND">
                </form>    
            </div>

            <div class="dealer">

            </div>



        </div>

        <br>
        <br>
        <br>
        <br>

        <a href="kill.php">KILL!</a>

    </body>
</html>