<?php

class Villageois extends Personnage
{
 
    public function __construct($id,$carte_id,$name_pers,$life,$status, $vote, $partie)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status, $vote, $partie);
    }

       // un villageois n'a pas d'action de nuit 
    public function actionNuit(){
        return null;
    }
}