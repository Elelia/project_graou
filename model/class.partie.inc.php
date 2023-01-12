<?php


class Partie
{
    private $chMortNuit;
    private $listPerso;
    public function __construct()
    {
    }

    public function startGame()
    {
      echo '55';
      $this->nuit();
      echo '55';
    }

    public function nuit()
    {
      foreach($this->listPerso as $pers)
      {
          $pers->actionNuit();
      }
    }

    public function get_chMortNuit()
    {
        return $this->chMortNuit;
    }

    public function addMortNuit($pers)
    {
      $this->chMortNuit->append($pers);
    }

    
    public function get_lesPersos()
  {
    return $this->listPerso;
  }

  public function set_lesPersos($listPerso) {
    $this->listPerso=$listPerso;
  }


  public function getGentil(){
    $gentils = new ArrayObject();
    foreach($this->listPerso as $pers){
      if($pers->get_carteId() == 2 || $pers->get_carteId() == 3 || $pers->get_carteId() == 4){
      $gentils->append($pers);
      }
    }
    return $gentils;
  }
}

