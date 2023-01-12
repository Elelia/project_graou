<?php
require_once("model/class.database.inc.php");
require_once("model/class.personnage.inc.php");
require_once("model/class.loupgarou.inc.php");
require_once("model/class.villageois.inc.php");
require_once("model/class.sorciere.inc.php");
require_once("model/class.voyante.inc.php");
require_once("model/class.unPersonnage.inc.php");

$action = $_REQUEST['action'];

switch($action)
{
	case 'startGame':
	{
		//la partie commence
		//on attribue les cartes aux joueurs
		//il faut lancer la nuit
		$pseudo = $_REQUEST['pseudo'];
		unPersonnage::changePseudo($pseudo);
		//on créer une variable user vide qui sera notre joueur
		$user = '';
		//on récupère les personnages en base de données
		$lesPersonnages = unPersonnage::giveRandomCardId();

		$objectPersonnage = new arrayObject();
		foreach($lesPersonnages as $personnage) {
			$classe = $personnage->name;
			$objectPers = new $classe($personnage->id,$personnage->carte_id, $personnage->name_pers, $personnage->life, $personnage->status, 0);
		 	$objectPersonnage->append($objectPers);
		 	if($objectPers->get_status() == '1') {
		 		$user = $objectPers;
		 	}
		}

		//je test juste en prenant l'id du user
		$id = $user->get_id();

		$test=$user->get_carteId();
		$carte = "carte1.png";

		break;
	}
	case 'startDay':
	{

		break;
	}
}

include("view/game.php");


?>