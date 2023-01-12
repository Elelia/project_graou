<?php

class Voyante extends Personnage
{
    public function __construct($id,$carte_id,$name_pers,$life,$status,$vote)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status,$vote);
    }

    public static function chooseCard($idCarteSelec){
        $req="select c.name from carte c inner join personnage p on p.carte_id = c.id where p.id = '$idCarteSelec'";
        $res = Database::get_monPdo()->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;

    }
}