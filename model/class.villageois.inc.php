<?php

class Villageois extends Personnage
{
    public function __construct($id,$carte_id,$name_pers,$life,$status)
    {
        parent::__construct($id,$carte_id,$name_pers,$life,$status);
    }
}