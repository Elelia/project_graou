<?php


class Loupgarou extends Personnage
{

    public function __construct($id,$carte_id,$name_pers,$life,$status)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status,null);
    }

    
    /**
     * un loup garou graille des villageois la nuit
     * @param $objectPersonnage liste de personnage
     * @param $idPersonneSelect Id du personnage choisis 
     */
    public function ActionNuit($idPersonneSelect, $objectPersonnage)
    {
      foreach($objectPersonnage as $personnage)
      {
        if($personnage->get_Id() == $idPersonneSelect)
        {
          // set life to 0 when  characters get killed 
          $personnage->set_life(0);
        }
      }
    }  
}