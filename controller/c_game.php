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
	case 'startGame':
	{
		$pseudo = $_REQUEST['pseudo'];
		unPersonnage::changePseudo($pseudo);
		//on créer une variable user vide qui sera notre joueur
		$user = '';
		//on récupère les personnages en base de données
		$lesPersonnages = unPersonnage::giveRandomCardId();

		$objectPersonnage = new arrayObject();
		foreach($lesPersonnages as $personnage) {
			$objectPers = new Personnage($personnage->id,$personnage->carte_id, $personnage->name_pers, $personnage->life, $personnage->status);
		 	$objectPersonnage->append($objectPers);
		 	if($objectPers->get_status() == '1') {
		 		$user = $objectPers;
		 	}
		}
		
		$test=$user->get_carteId();
		$carte = "carte1.png";
		include("view/game.php");
		break;
	}
}


?>