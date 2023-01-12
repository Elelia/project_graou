<?php
require_once("model/class.database.inc.php");
require_once("model/class.personnage.inc.php");
require_once("model/class.unPersonnage.inc.php");

if(!isset($_REQUEST['action']))
{
	$_REQUEST['action'] = 'home';
}
$action = $_REQUEST['action'];
var_dump($action);
switch($action)
{
    case 'home':
    {
        include("view/index.html");
        break;
    }
	case 'startGame':
	{
		//on créer une variable user vide qui sera notre joueur
		$user = '';
		//on récupère les personnages en base de données
		$lesPersonnages = unPersonnage::getAllPersonnage();
		//var_dump($lesPersonnages);
		//on créer un tableau d'objet vide
		$objectPersonnage = new arrayObject();
		//on parcourt les personnages à base et on créer les objets personnage qu'on met dans le tableau d'objet
		//on met l'objet personnage dans le user si c'est UserTest en name
		foreach($lesPersonnages as $personnage) {
			$objectPers = new Personnage($personnage['id'],$personnage['carte_id'], $personnage['name_pers'], $personnage['life'], $personnage['status']);
			$objectPersonnage->append($objectPers);
			if($objectPers->get_namePers() == 'UserTest') {
				$user = $objectPers;
			}
		}
		var_dump($user);
		//var_dump($objectPersonnage);
		//on créer le tableau des cartes dispo en base
		$distribCarte = array(1,1,2,2,2,2,3,3);
		//on parcourt les personnages
		//on mélange le tableau à chaque passage de personnage
		//on parcourt dans le même temps le tableau des cartes
		//nb permet de ne pas parcourir tout le tableau des cartes sur le même personnage
		//on attribue l'id de la carte en index au personnage en index et on retire ensuite l'index du tableau de carte et on change nb à 1
		foreach($objectPersonnage as $indexPers=>$personnage) {
			shuffle($distribCarte);
			$nb=0;
			foreach($distribCarte as $indexCarte=>$carte) {
				if($nb==0) {
					$personnage->set_carteId($carte);
					if($personnage->get_namePers() == 'UserTest') {
						$user->set_carteId($carte);
					}
					unset($distribCarte[$indexCarte]);
					$nb = 1;
				}
			}
			var_dump($personnage->get_carteId());
		}
		var_dump($user);
		$test=$user->get_carteId();
		$carte = "image3.PNG";
		//faudrait que chaque image de carte ait le même id qu'en base comme ça on fait
		//un foreach dans le html des personnages avec get id carte
		//et on affiche la bonne carte pour chaque joueur

		//faire un getnamecartbyid pour récupérer le nom de la carte et l'afficher sur
		//la page

		include("view/game.php");
		break;
	}
}


?>