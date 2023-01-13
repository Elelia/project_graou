<?php

class Voyante extends Personnage
{
  private $role;
  private $lgVu;

  public function __construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie)
  {
    parent::__construct($id, $carte_id, $name_pers, $life, $status, $vote, $partie, 15);
    $this->role = 'village';
    $this->lgVu = new ArrayObject();
  }

  public function getRole()
  {
    return $this->role;
  }

  public static function chooseCard($idCarteSelec)
  {
    $req = "select c.name from carte c inner join personnage p on p.carte_id = c.id where p.id = '$idCarteSelec'";
    $res = Database::get_monPdo()->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function actionNuit()
  {
    $randomPers = $this->getRandomPers($this);
    if ($randomPers->getRole() == 'loup') {
      $this->lgVu->append($randomPers);
    }
    echo '<br> la voyante a vu le role de ', $randomPers->get_namePers(), ' il était : ', $randomPers->getRole(), '<br>';
  }

  public function actionJour()
  {
    if (empty($this->lgVu) == false) {
      foreach ($this->lgVu as $lg) {
        foreach (parent::get_partie()->getJoueurEnVie() as $pers) {
          if ($lg == $pers) {
            $lg->addVote();
            echo '<br> v = loup <br>';
            return null;
          }
        }
      }
    }

    $randomPers = $this->getRandomPers($this);
    if ($randomPers != null) {
      echo '<br> v = aleatoire <br>';
      $randomPers->addVote();
    }
  }
}
