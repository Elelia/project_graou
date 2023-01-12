<?php


class Personnage 
{
    private $id;
    private $carte_id;
    private $name_pers;
    private $life;
    private $status;
    private $vote;
    private $partie;

    public function __construct($id,$carte_id,$name_pers,$life,$status, $vote, $partie)
    {
        $this->id=$id;
        $this->carte_id=$carte_id;
        $this->name_pers=$name_pers;
        $this->life=$life;
        $this->status=$status;
        $this->vote=$vote;
        $this->partie=$partie;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_carteId()
    {
        return $this->carte_id;
    }

    public function get_namePers()
    {
        return $this->name_pers;
    }
    
    public function get_life()
    {
        return $this->life;
    }

    public function get_status()
    {
        return $this->status;
    }

    public function get_partie()
    {
        return $this->partie;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_carteId($carte_id) {
        $this->carte_id=$carte_id;
    }

    public function set_namePers($name_pers) {
        $this->name_pers=$name_pers;
    }

    public function set_life($life) {
        $this->life=$life;
    }

    public function set_status($status) {
        $this->status=$status;
    }


    public static function getListPersoAlive($objectPersonnage)
    {
      $listPerso = $objectPersonnage;
      $persVivant = new ArrayObject();
      foreach($listPerso as $pers)
      {
        if($pers->get_life() == 1)
        {
          $persVivant->append($pers);
        }
      }
      return $persVivant;
    }

    public static function getListPersoDead($objectPersonnage)
    {
      $listPerso = $objectPersonnage;
      $persMort = new ArrayObject();
      foreach($listPerso as $pers)
      {
        if($pers->get_life() == 0)
        {
          $persMort->append($pers);
        }
      }
      return $persMort;
    }
    


    //fonction vote
    public function get_vote()
    {
        return $this->vote;
    }

    public function set_vote($vote) 
    {
      $this->vote=$vote;
    }

    public function resetVote($objectPersonnage)
    {
      foreach($objectPersonnage as $perso)
      {
        $perso->set_vote(0);
      }
    }

    public static function vote($idPersonneSelect, $objectPersonnage)
    {
      foreach($objectPersonnage as $personnage)
      {
        if($personnage->get_Id() == $idPersonneSelect)
        {
          $nbVote = $personnage->get_vote();
          $personnage->set_vote($nbVote+1);
        }
      }
    }  
}
