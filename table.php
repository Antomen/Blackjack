<?php
include "class.Cards.php";

$cards = new Cards();

if (!isset($_SESSION["summa"])) {
    $_SESSION["summa"] = 0;
}
if (!isset($_SESSION["summa2"])) {
    $_SESSION["summa2"] = 0;
}

if (!isset($_SESSION["ace"])) {
    $_SESSION["ace"] = null;
}

$firstTime = true;
$gameOver = false;

if (!isset($_SESSION["deck"])) {

    $_SESSION["deck"] = array(
        $heart = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "jack", "queen", "king", "ace"),
        $diamonds = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "jack", "queen", "king", "ace"),
        $clover = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "jack", "queen", "king", "ace"),
        $spades = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "jack", "queen", "king", "ace")
    );
}

if (isset($_GET["action"])) {

    if ($_GET["action"] == "HIT") {

        $cards->createCards();

        $term = $_SESSION["cards"][count($_SESSION["cards"]) - 1][0];


        if ($term === "jack" || $term === "queen" || $term === "king") {
            $_SESSION["summa"] += 10;
        } else if ($term == "ace") {

            $_SESSION["summa"] += 11;

            $_SESSION["ace"] = true;
        } else {

            $_SESSION["summa"] += $term;
        }
    }

    if ($_GET["action"] == "STAND") {
        
    }

    if ($_GET["action"] == "Spela igen") {
        include "kill.php";
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
                    if (isset($_SESSION["cards"])) {

                        foreach ($_SESSION["cards"] as $card) {

                            echo $card[0] . " of " . $card[1] . "<br>";
                        }
                    }
                    ?>

                </div>

                <?php
                if (!$_SESSION["summa"] == 0) {
                    echo "Summa: " . $_SESSION["summa"];

                    if ($_SESSION["ace"] == true) {
                        $_SESSION["summa2"] = $_SESSION["summa"] - 10;
                        echo "/" . $_SESSION["summa2"];
                    }

                    echo "<br>";
                }


                if ($_SESSION["summa"] > 21) {

                    if ($_SESSION["ace"] == true) {
                        if ($_SESSION["summa2"] > 21) {
                            $gameOver = true;
                            echo "You lost. Play again?";
                            echo "<br>";
                        }
                    } else {
                        $gameOver = true;
                        echo "You lost. Play again?";
                        echo "<br>";
                    }
                } else if ($_SESSION["summa"] == 21 || $_SESSION["summa2"] == 21) {
                    
                }

                echo "<br>";

                switch ($gameOver) {

                    case false:
                        echo "<form method='GET'>";
                        echo "<input type='submit' name='action' value='HIT'>";
                        echo "<input type='submit' name='action' value='STAND'>";
                        echo "</form>";
                        break;

                    case true:
                        echo "<form method='GET'>";
                        echo "<input type='submit' name='action' value='Spela igen'>";
                        echo "</form>";
                        break;
                }
                ?>

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