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
        //$res->execute();
		$lesPersonnages = $res->fetchAll();
        $distribCarte = array(1,1,2,2,2,3,4);
        foreach($lesPersonnages as $personnage) {
            shuffle($distribCarte);
            $idPers = $personnage->id;
			$nb=0;
			foreach($distribCarte as $indexCarte=>$carte) {
				if($nb==0) {
					$req="update personnage set carte_id = '$carte' where id = '$idPers'";
                    Database::get_monPdo()->exec($req);
					unset($distribCarte[$indexCarte]);
					$nb = 1;
				}
			}
        }
        $req = "select p.id, p.carte_id, p.name_pers, p.life, p.status, c.name, c.id as id_carte from personnage p INNER JOIN carte c ON c.id = p.carte_id order by p.id";
        $res = Database::get_monPdo()->query($req);
        $res->setFetchMode(PDO::FETCH_OBJ);
        //$res->execute();
        $lesLignes = $res->fetchAll();
        //var_dump($lesLignes);
        return $lesLignes;
    }

    public static function changePseudo($pseudo) {
        $req="update personnage set name_pers = '$pseudo' where status = '1'";
        Database::get_monPdo()->exec($req);
    }

    public static function getPersonnageById($id) {
        try {
            $cnx = Database::get_monPdo();
            $req = $cnx->prepare("select * from personnage where id like :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);

            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }


}
