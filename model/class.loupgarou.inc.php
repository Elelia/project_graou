<?php


class Loupgarou extends Personnage
{

    public function __construct($id,$carte_id,$name_pers,$life,$status, $vote,$partie)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status,$vote, $partie);
    }

    
    /**
     * un loup garou graille des villageois la nuit
     * @param $objectPersonnage liste de personnage
     * @param $idPersonneSelect Id du personnage choisis 
     */
    public function actionNuit()
    {
      if (count(parent::get_partie()->get_chMortNuit()) == 0)
      {
        $tabGentil = parent::get_partie()->getGentils();
        //var_dump($tabGentil);
        $PersonneSelect = $tabGentil[rand(0, count($tabGentil))];
        parent::get_partie()->addMortNuit($PersonneSelect);
        //var_dump($PersonneSelect);
        echo '5';
      }
      //$idPersonneSelect = parent::get_partie()->getIdPersonneSelect();
      
    }  
}