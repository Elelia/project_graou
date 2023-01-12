<?php

class Villageois extends Personnage
{
    public function __construct($id,$carte_id,$name_pers,$life,$status,$vote)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status,$vote);
    }

       // un villageois n'a pas d'action de nuit 
    public function ActionNuit(){
        return null;
    }
}