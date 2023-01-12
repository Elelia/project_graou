<?php

class unPersonnage
{
    public static function getAllPersonnage() {
        $req="select * from personnage";
        $res = Database::get_monPdo()->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
    }

    public static function giveRandomCardId() {
        $req="select * from personnage";
        $res = Database::get_monPdo()->query($req);
        $res->setFetchMode(PDO::FETCH_OBJ);
        $res->execute();
		$lesPersonnages = $res->fetchAll();
        //var_dump($lesPersonnages);
        $distribCarte = array(1,1,2,2,2,2,3,3);
        var_dump($distribCarte);
        foreach($lesPersonnages as $personnage) {
            shuffle($distribCarte);
            var_dump($distribCarte);
			$nb=0;
			foreach($distribCarte as $indexCarte=>$carte) {
                var_dump($carte);
				if($nb==0) {
					$req="update personnage set carte_id = '$carte'";
                    Database::get_monPdo()->exec($req);
					unset($distribCarte[$indexCarte]);
					$nb = 1;
				}
			}
        }
        $req = "select p.id, p.carte_id, p.name_pers, p.life, p.status, c.name, c.id from personnage p INNER JOIN carte c ON c.id = p.carte_id";
        $res = Database::get_monPdo()->query($req);
        $lesLignes = $res->fetchAll();
        //var_dump($lesLignes);
        return $lesLignes;
    }

    // public static function giveIdCard($objectPersonnage, $user) {
    //     var_dump($objectPersonnage);
    //     $distribCarte = array(1,1,2,2,2,2,3,3);
    //     foreach($objectPersonnage as $indexPers=>$personnage) {
	// 		shuffle($distribCarte);
	// 		$nb=0;
	// 		foreach($distribCarte as $indexCarte=>$carte) {
	// 			if($nb==0) {
	// 				$personnage->set_carteId($carte);
	// 				if($personnage->get_namePers() == 'UserTest') {
	// 					$user->set_carteId($carte);
	// 				}
	// 				unset($distribCarte[$indexCarte]);
	// 				$nb = 1;
	// 			}
	// 		}
	// 		var_dump($personnage->get_carteId());
	// 	}
    // }

}

?>