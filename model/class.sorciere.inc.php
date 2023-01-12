<?php

class Sorciere extends Personnage
{
    // private $potionGuerison = 1;
    // private $potionPoison = 1;
    // private $nbPotions;

    public function construct($id,$carte_id,$name_pers,$life,$status,$vote, $partie)
    {
        parent::construct($id,$carte_id,$name_pers,$life,$status,$vote, $partie);
        // $this->nbPotions=$nbPotions;
        // $this->potionGuerison=$potionGuerison;
        // $this->potionPoison=$potionPoison;

    }

    public function getNbPotionsRestantes()
    {
        $this->nbPotions = $this->potionGuerison+$this->potionPoison;
    }

    public function UsePotionGuerison()
    {
        //vie de la personne = 1
        $this->nbPotions -= 1;

    }

    public function UsePotionPoison()
    {
        //vie de la personne = 0 
        $this->nbPotions -= 1;
    }


    // la sorcière a deux potions
    // 1 potion guérison
    // 1 potion empoisonnement
    // elle peut les utiliser chacune qu'une seule fois dans la partie
    // et peut utiliser les deux en même temps
}