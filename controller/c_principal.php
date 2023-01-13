<?php

function controleurPrincipal($uc) {
    $lesActions=array();
    $lesActions["defaut"]="c_prepare.php";
    $lesActions["startgame"]="c_game.php";

    if (array_key_exists($uc, $lesActions)) {
        return $lesActions[$uc];
    } 
    else {
        return $lesActions["defaut"];
    }
}
