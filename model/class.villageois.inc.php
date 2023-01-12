<?php

class Villageois extends Personnage
{
    public function __construct($id,$carte_id,$name_pers,$life,$status, $partie)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status, 0, $partie);
    }

       // un villageois n'a pas d'action de nuit 
    public function ActionNuit(){
        return null;
    }
}