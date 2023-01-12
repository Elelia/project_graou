<?php
require_once("model/class.database.inc.php");
require_once("model/class.personnage.inc.php");
require_once("model/class.unPersonnage.inc.php");
require_once("model/class.partie.inc.php");

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
    $laMereDeRaphael = new Partie();

		$objectPersonnage = new arrayObject();
		foreach($lesPersonnages as $personnage) {
			$objectPers = new Personnage($personnage->id,$personnage->carte_id, $personnage->name_pers, $personnage->life, $personnage->status, 0, $laMereDeRaphael);
		 	$objectPersonnage->append($objectPers);
		 	if($objectPers->get_status() == '1') {
		 		$user = $objectPers;
		 	}
		}
    $laMereDeRaphael->set_lesPersos($objectPersonnage);
    // var_dump($laMereDeRaphael);

    $laMereDeRaphael->startGame();
    //Personnage::vote(1, $objectPersonnage); 
		//var_dump($objectPersonnage);

		//$blop = unPersonnage::getPersonnageById(3);
		//var_dump($blop);


     //$listPers = Personnage::getListPersoAlive($objectPersonnage);
		 //var_dump($listPers);

    //$listPers = Personnage::getListPersoDead($objectPersonnage);
		//var_dump($listPers);


		$test=$user->get_carteId();
		$carte = "carte1.png";
		include("view/game.php");
		break;
	}
}


?>