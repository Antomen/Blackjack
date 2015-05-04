<?php
include "class.Cards.php";
include "class.Ace.php";

$cards = new Cards();
$ace = new Ace();

if (!isset($_SESSION["summa"])) {
    echo "hej!";
    $_SESSION["summa"] = 0;
}

$aceStatement = null;

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

            if ($_SESSION["summa"] > 10) {
                $_SESSION["summa"] += 1;
            } else {
                $aceStatement = true;
            }
        } else {
            $_SESSION["summa"] += $term;
        }

        echo $_SESSION["summa"];
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
                    if (isset($_SESSION["cards"])) {


                        foreach ($_SESSION["cards"] as $card) {

                            if ($aceStatement == true) {
                                $ace->aceCalc();
                                $aceStatement = false;
                            } else {
                                echo $card[0] . " of " . $card[1] . "<br>";
                            }
                        }
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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="ace.js"></script>    
    </body>
</html>