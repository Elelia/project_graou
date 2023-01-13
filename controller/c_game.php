<?php
require_once("model/class.database.inc.php");
require_once("model/class.personnage.inc.php");
require_once("model/class.loupgarou.inc.php");
require_once("model/class.villageois.inc.php");
require_once("model/class.sorciere.inc.php");
require_once("model/class.voyante.inc.php");
require_once("model/class.unPersonnage.inc.php");
require_once("model/class.partie.inc.php");

$action = $_REQUEST['action'];

switch($action)
{
	case 'startGame':
	{
		//on récupère le pseudo saisit par l'utilisateur et on le modifie en base
		$pseudo = $_REQUEST['pseudo'];
		unPersonnage::changePseudo($pseudo);
		//on créer une variable user vide qui sera notre joueur
		$user = '';
		//on récupère les personnages en base de données et on leur donne des id_carte aléatoire
		$lesPersonnages = unPersonnage::giveRandomCardId();
    	//on instancie notre partie
		$partie = new Partie();

		//on créer les différents personnages
		foreach($lesPersonnages as $personnage) {
			$classe = $personnage->name;
			$objectPers = new $classe($personnage->id,$personnage->carte_id, $personnage->name_pers, $personnage->life, $personnage->status, 0, $partie);
		 	$partie->addPersonnage($objectPers);
		 	if($objectPers->get_status() == '1') {
		 		$user = $objectPers;
		 	}
		}
   
		//on lance la partie
    	$partie->startGame();

		//test pour changer la carte en fonction d'un id_carte du joueur
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
