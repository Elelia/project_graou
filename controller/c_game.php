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
	case 'reglement':
	{
		include("view/reglement.html");
        break;
	}
	case 'startGame':
	{
		//on créer une variable user vide qui sera notre joueur
		$user = '';
		//on récupère les personnages en base de données
		$lesPersonnages = unPersonnage::getAllPersonnage();

		//une fonction qui update le carteid des personnages en base au hasard
		//on la lance et ensuite on créer les personnages
		

		$objectPersonnage = new arrayObject();
		
		foreach($lesPersonnages as $personnage) {
			$objectPers = new Personnage($personnage['id'],$personnage['carte_id'], $personnage['name_pers'], $personnage['life'], $personnage['status']);
			$objectPersonnage->append($objectPers);
			if($objectPers->get_namePers() == 'UserTest') {
				$user = $objectPers;
			}
		}
		
		unPersonnage::giveIdCard($objectPersonnage, $user);



		$test=$user->get_carteId();
		$carte = "carte1.png";
		//en fonction de l'id_carte on parcours nos objets et on fait différentes
		//variable de carte pour afficher les bonnes cartes ensuite
		//comme on a un nombre défini de joueur c'est facile

		//faire un getnamecartbyid pour récupérer le nom de la carte et l'afficher sur
		//la page

		//faudra jouer sur les switch case pour gérer les actions jours/nuit i think

		//on stock les personnages dans la variable SESSION je pense
		include("view/game.php");
		break;
	}
}


?>