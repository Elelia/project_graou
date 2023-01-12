<?php
require_once("model/class.database.inc.php");
require_once("model/class.personnage.inc.php");
require_once("model/class.unPersonnage.inc.php");

if(!isset($_REQUEST['action']))
{
	$_REQUEST['action'] = 'home';
}
$action = $_REQUEST['action'];

switch($action)
{
    case 'home':
    {
        include("view/index.html");
        break;
    }
	case 'prepareGame':
	{
		include("view/preparegame.html");
		break;
	}
}

?>