<?php


class Partie
{
    private $chListJoueur;
    private $chMortNuit;
    private $chListRole;
    private $listperso;
    public function __construct($chListJoueur,$chMortNuit,$chListRole,$listperso)
    {
        $this->chListJoueur=$chListJoueur;
        $this->chMortNuit=$chMortNuit;
        $this->chListRole=$chListRole;
        $this->listperso=$listperso;
    }

    public function get_chListJoueur()
    {
        return $this->chListJoueur;
    }

    public function get_chMortNuit()
    {
        return $this->chMortNuit;
    }

    public function get_chListRole()
    {
        return $this->chListRole;
    }
    
    public function get_listperso()
    {
        return $this->listperso;
    }

    public function getListPerso($objectPersonnage)
    {
      $listPerso = $objectPersonnage;
      return $listPerso;
    }
}