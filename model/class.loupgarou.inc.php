<?php


class Loupgarou extends Personnage
{

    public function __construct($id,$carte_id,$name_pers,$life,$status, $partie)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status,null, $partie);
    }

    
    /**
     * un loup garou graille des villageois la nuit
     * @param $objectPersonnage liste de personnage
     * @param $idPersonneSelect Id du personnage choisis 
     */
    public function actionNuit()
    {
      //$idPersonneSelect = parent::get_partie()->getIdPersonneSelect();
      $tabGentil = parent::get_partie()->getGentils();
      $idPersonneSelect = $tabGentil[rand(0, count($tabGentil))];
      parent::get_partie()->addMortNuit($idPersonneSelect);
      var_dump($tabGentil);
      echo 'salut';    
    }  
}