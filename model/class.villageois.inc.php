<?php

class Villageois extends Personnage
{
    public function __construct($id,$carte_id,$name_pers,$life,$status)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status);
    }

       // un villageois n'a pas d'action de nuit 
    public function ActionNuit(){
        return null;
    }
}