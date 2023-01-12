<?php


class Partie
{
    private $chMortNuit;
    private $listPerso;
    public function __construct()
    {
      $this->chMortNuit = new ArrayObject();
    }

    public function startGame()
    {
      $this->nuit();
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


  public function getGentils(){
    $gentils = new ArrayObject();
    $trouduc = $this->listPerso;
    //var_dump($this->listPerso);
    var_dump($trouduc);
    foreach($trouduc as $index=>$pers){
      
      if($pers->get_carteId() == 2 || $pers->get_carteId() == 3 || $pers->get_carteId() == 4){

        //$gentils->add($pers);
      }
    }
    return $gentils;
  }
}

