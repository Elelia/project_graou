<?php
require_once("model/class.database.inc.php");
require("controller/c_principal.php");

if (!isset($_SESSION)) {
    session_start();
}

include("view/navbar.html");
include("view/header.html");

$pdo = Database::getDatabase();

if (isset($_GET["uc"])) {
    $uc = $_GET["uc"];
}
else {  
    $uc = "defaut";
}

$fichier = controleurPrincipal($uc);
include("controller/$fichier");

?>