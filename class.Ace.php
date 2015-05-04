<?php

class Ace {

    public function aceCalc() {

        echo "<form method='GET'>";
        "You got an ace! <input type='submit' name='action' value='11'>  or  <input type='submit' name='action' value='1'> ? <br>";
        echo "</from>";

        if ($_GET["action"] == "11") {
            $_SESSION["summa"] += 11;
        }
        if ($_GET["action"] == "1") {
            $_SESSION["summa"] += 1;
        }
        
        return true;
    }

}
