<?php


class Loupgarou extends Personnage
{
  private $role;

  public function __construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie)
  {
    parent::__construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie, 5);
    $this->role = 'loup';
  }

  public function getRole()
  {
    return $this->role;
  }
  /**
   * un loup garou graille des villageois la nuit
   * @param $objectPersonnage liste de personnage
   * @param $idPersonneSelect Id du personnage choisis 
   */
  public function actionNuit()
  {
    $tabGentil = parent::get_partie()->getGentils();
    $PersonneSelect = $tabGentil[rand(0, count($tabGentil) - 1)];
    parent::get_partie()->setMortNuit($PersonneSelect);
    echo 'les loups garous ont décidé de manger ', $PersonneSelect->get_namePers(), "<br>";
  }

  public function actionJour()
  {
    $randomPers = $this->getRandomPers($this);
    if ($randomPers != null) {
      $randomPers->addVote();
    }
  }
}
