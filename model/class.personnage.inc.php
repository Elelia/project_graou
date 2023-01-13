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
  private $priorite;

  public function __construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie, $priorite)
  {
    $this->id = $id;
    $this->carte_id = $carte_id;
    $this->name_pers = $name_pers;
    $this->life = $life;
    $this->status = $status;
    $this->vote = $vote;
    $this->partie = $partie;
    $this->priorite = $priorite;
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

  public function getPriorite()
  {
    return $this->priorite;
  }

  public function get_partie()
  {
    return $this->partie;
  }

  public function set_id($id)
  {
    $this->id = $id;
  }

  public function set_carteId($carte_id)
  {
    $this->carte_id = $carte_id;
  }

  public function set_namePers($name_pers)
  {
    $this->name_pers = $name_pers;
  }

  public function set_life($life)
  {
    $this->life = $life;
  }

  public function set_status($status)
  {
    $this->status = $status;
  }

  public static function getListPersoAlive($objectPersonnage)
  {
    $listPerso = $objectPersonnage;
    $persVivant = new ArrayObject();
    foreach ($listPerso as $pers) {
      if ($pers->get_life() == 1) {
        $persVivant->append($pers);
      }
    }
    return $persVivant;
  }

  public static function getListPersoDead($objectPersonnage)
  {
    $listPerso = $objectPersonnage;
    $persMort = new ArrayObject();
    foreach ($listPerso as $pers) {
      if ($pers->get_life() == 0) {
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

  //on ajoute 1 à l'attribut vote
  public function addVote()
  {
    $this->vote += 1;
  }

  public function resetVote()
  {
    $this->vote = 0;
  }

  public function vote($idPersonneSelect, $objectPersonnage)
  {
    foreach ($objectPersonnage as $personnage) {
      if ($personnage->get_Id() == $idPersonneSelect) {
        $nbVote = $personnage->get_vote();
        $personnage->set_vote($nbVote + 1);
      }
    }
  }

  //retourne un personnage au hasard parmis les joueurs en vie
  public function getRandomPers($me)
  {
    $notMe = new ArrayObject();
    $listPerso = $this->partie->getJoueurEnVie();
    //unset($listPerso[$me]);
    foreach ($listPerso as $perso) {
      if ($perso != $me) {
        $notMe->append($perso);
      }
    }
    if (count($listPerso) > 1) {
      return $notMe[rand(0, count($notMe) - 1)];
    } else {
      return null;
    }
  }
}
