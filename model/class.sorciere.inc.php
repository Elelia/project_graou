<?php

class Sorciere extends Personnage
{
  private $potionGuerison = 1;
  private $potionPoison = 1;
  private $nbPotions;
  private $role;

  public function __construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie)
  {
    parent::__construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie, 10);
    $this->role = 'village';
    // $this->nbPotions=$nbPotions;
    // $this->potionGuerison=$potionGuerison;
    // $this->potionPoison=$potionPoison;

  }

  //méthode qui retourne le role du personnage, qui permet de déterminer s'il fait partie des gentils ou des méchants
  public function getRole()
  {
    return $this->role;
  }

  //méthode qui permet à la sorcière d'utiliser ses potions
  public function actionNuit()
  {
    echo 'la sorciere se réveille', "<br>";
    $hasard = rand(1, 3);
    if ($this->potionGuerison == 1 && $hasard == 1) {
      parent::get_partie()->setMortNuit(null);
      $this->potionGuerison -= 1;
      echo 'la sorciere utilise la potion de guérison et sauve le mort', "<br>";
    }
    if ($this->potionPoison == 1 && $hasard == 2) {
      $personneEmpoisonee = $this->getRandomPers($this);
      if ($personneEmpoisonee != null) {
        while ($personneEmpoisonee == parent::get_partie()->get_chMortNuit()) {
          $personneEmpoisonee = $this->getRandomPers($this);
        }
        echo 'la sorciere utilise la potion de mort et tue ', $personneEmpoisonee->get_namePers(), "<br>";
        parent::get_partie()->mort($personneEmpoisonee);
        $this->potionPoison -= 1;
      }
    }
  }

  public function actionJour()
  {
    return $this->getRandomPers($this);
  }
}
