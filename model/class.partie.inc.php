<?php


class Partie
{
    private $chMortNuit;
    private $listPerso;
    public function __construct()
    {
      $this->listPerso = new ArrayObject();
    }

    public function startGame()
    {
      while($this->finDePartie() == false)
      {
        $this->nuit();
        if($this->finDePartie() == false)
        {
          $this->jour();
        }
      
      }
      if(count($this->getGentils()) == 0)
      {
        echo ' <br> les loups ont gagné ';
      }
      else if(count($this->getJoueurEnVie()) == 0){
        echo ' <br> égalité, personne ne gagne ';   
      }
      else{
        echo ' <br> les villageois ont gagné ';   
      }
      echo '<br> fin de partie';
      //$this->jour();
    }

    public function jour()
    {
      echo '<br> ********debut jour <br>';
      $listperso = $this->getJoueurEnVie();      
      foreach($listperso as $perso)
      {
        $perso->actionJour();
      }
      $persoVoteMax=null;

      foreach($listperso as $perso)
      {
        if($persoVoteMax == null)
        {
          $persoVoteMax = $perso;
        }
        else if($perso->get_vote() > $persoVoteMax->get_vote())
        {
          $persoVoteMax->resetVote();
          $persoVoteMax = $perso;
        }
        else {
          $perso->resetVote();
        }
      }
      echo 'le conseil à choisi de vous eliminer, et leurs sentance est irrévocable ', $persoVoteMax->get_namePers();
      $this->mort($persoVoteMax);
    }

    public function nuit()
    {
      $listJoueurEnVie = $this->getLoups();
      foreach($this->getGentils() as $gentil)
      {
        $listJoueurEnVie->append($gentil);
      }
     
      echo '********debut nuit <br>';
      //var_dump($this->listPerso);
      $this->chMortNuit = null;
      foreach($listJoueurEnVie as $JoueurEnVie)
      {
        $JoueurEnVie->actionNuit();
      }
             
      $this->mort($this->chMortNuit);
    }

    public function mort($pers)
    {
      if($pers != null)
      {
        $pers->set_life(0);
        echo '<br>', $pers->get_namePers(),' est mort <br>';
      }
    }


    public function get_chMortNuit()
    {
        return $this->chMortNuit;
    }

    public function setMortNuit($pers)
    {
      $this->chMortNuit = $pers;
    }

    
    public function get_lesPersos()
  {
    return $this->listPerso;
  }

  public function addPersonnage($personnage) {
    $this->listPerso->append($personnage);
  }


  public function getGentils(){
    $gentils = new ArrayObject();
    $trouduc = $this->getJoueurEnVie();
    foreach($trouduc as $index=>$pers){
      
      if($pers->getRole() == 'village'){
        $gentils->append($pers);
      }
    }
    return $gentils;
  }

  public function getLoups(){
    $loups = new ArrayObject();
    $trouduc = $this->getJoueurEnVie();
    foreach($trouduc as $index=>$pers){
      
      if($pers->getRole() == 'loup'){
        $loups->append($pers);
      }
    }
    return $loups;
  }




  public function getJoueurEnVie(){
    $enVie = new ArrayObject();
    $trouduc = $this->listPerso;

    foreach($trouduc as $index=>$pers){
      
      if($pers->get_life() == 1){
        $enVie->append($pers);
      }
    }
    return $enVie;
  } 

  public function finDePartie(){
    $fin = false;
    if(count($this->getJoueurEnVie()) > 0)
    {
      if(count($this->getGentils()) % count($this->getJoueurEnVie()) == 0)
      {
        $fin = true;
      }
    }
    else{
      $fin = true;
    }
    
    return $fin;
  }
}

