<?php

class Villageois extends Personnage
{
  private $role;
  public function __construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie)
  {
    parent::__construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie, 20);
    $this->role = 'village';
  }

  public function getRole()
  {
    return $this->role;
  }
  // un villageois n'a pas d'action de nuit 
  public function actionNuit()
  {
    return null;
  }

  public function actionJour()
  {
    $randomPers = $this->getRandomPers($this);
    if ($randomPers != null) {
      $randomPers->addVote();
    }
  }
}
