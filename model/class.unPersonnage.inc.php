<?php

class unPersonnage
{
    public static function getAllPersonnage() {
        $req="select * from personnage";
        $res = Database::get_monPdo()->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
    }

    public static function randomCardId() {
        $distribCarte = array(1,1,2,2,2,2,3,3);
    }

    public static function giveIdCard($objectPersonnage, $user) {
        var_dump($objectPersonnage);
        $distribCarte = array(1,1,2,2,2,2,3,3);
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
    }


}

?>