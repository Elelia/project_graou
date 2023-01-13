<?php


class Partie
{
  private $chMortNuit;
  private $listPerso;

  public function __construct()
  {
    $this->listPerso = new ArrayObject();
  }

  //méthode qui est lancée en début de partie
  //permet d'alterner entre le jour et la nuit et vérifie si la partie est finie ou non
  //détermine également qui est le vainqueur de la partie
  public function startGame()
  {
    while ($this->finDePartie() == false) {
      $this->nuit();
      if ($this->finDePartie() == false) {
        $this->jour();
      }
    }
    if (count($this->getGentils()) == 0) {
      echo ' <br> les loups ont gagné ';
    } else if (count($this->getJoueurEnVie()) == 0) {
      echo ' <br> égalité, personne ne gagne ';
    } else {
      echo ' <br> les villageois ont gagné ';
    }
    echo '<br> fin de partie';
    //$this->jour();
  }

  //méthode qui est appelé après la nuit, jusqu'à ce qu'il y ait un vainqueur
  public function jour()
  {
    echo '<br> ********debut jour <br>';
    //on récupère les joueurs en vie
    $listperso = $this->getJoueurEnVie();
    //on parcourt les joueurs en vie et on les fait effectuer leur actionJour
    foreach ($listperso as $perso) {
      $perso->actionJour();
    }
    $persoVoteMax = null;

    //détermine quel personnage a reçu le plus de vote et le tue
    foreach ($listperso as $perso) {
      if ($persoVoteMax == null) {
        $persoVoteMax = $perso;
      } else if ($perso->get_vote() > $persoVoteMax->get_vote()) {
        $persoVoteMax->resetVote();
        $persoVoteMax = $perso;
      } else {
        $perso->resetVote();
      }
    }
    echo 'le conseil à choisi de vous éliminer, et leur sentence est irrévocable ', $persoVoteMax->get_namePers();
    $this->mort($persoVoteMax);
  }

  //méthode qui est appelé en début de partie et une fois que le jour soit passé, jusqu'à ce qu'il y ait un vainqueur
  public function nuit()
  {
    //les joueurs en vie sont les loups
    $listJoueurEnVie = $this->getLoups();
    //on ajoute également les autres personnages aux joueurs en vie
    foreach ($this->getGentils() as $gentil) {
      $listJoueurEnVie->append($gentil);
    }

    echo '********debut nuit <br>';
    $this->chMortNuit = null;
    foreach ($listJoueurEnVie as $JoueurEnVie) {
      $JoueurEnVie->actionNuit();
    }

    //s'il y a un mort, les actionNuit vont modifier la valeur de chMortNuit et il contiendra le ou les personnages morts de la nuit
    $this->mort($this->chMortNuit);
  }

  //méthode qui permet d'indiquer qu'un personnage est mort
  public function mort($pers)
  {
    if ($pers != null) {
      $pers->set_life(0);
      echo '<br>', $pers->get_namePers(), ' est mort <br>';
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

  public function addPersonnage($personnage)
  {
    $this->listPerso->append($personnage);
  }

  //méthode qui permet de retourner un tableau d'objet des personnages autre que loup
  public function getGentils()
  {
    $gentils = new ArrayObject();
    $joueur = $this->getJoueurEnVie();
    foreach ($joueur as $index => $pers) {

      if ($pers->getRole() == 'village') {
        $gentils->append($pers);
      }
    }
    return $gentils;
  }

  //méthode qui permet de retrouver un tableau d'objet des deux loups de la partie
  public function getLoups()
  {
    $loups = new ArrayObject();
    $joueur = $this->getJoueurEnVie();
    foreach ($joueur as $index => $pers) {

      if ($pers->getRole() == 'loup') {
        $loups->append($pers);
      }
    }
    return $loups;
  }

  //méthode qui permet d'obtenir un tableau d'objet des joueurs actuellement en vie
  public function getJoueurEnVie()
  {
    $enVie = new ArrayObject();
    $listPerso = $this->listPerso;

    foreach ($listPerso as $index => $pers) {

      if ($pers->get_life() == 1) {
        $enVie->append($pers);
      }
    }
    return $enVie;
  }

  //méthode qui permet de savoir si la partie est terminée ou non
  //on vérifie si le tableau est joueurs en vie est vide ou non
  //on compare également les joueurs en vie et les gentils
  public function finDePartie()
  {
    $fin = false;
    if (count($this->getJoueurEnVie()) > 0) {
      if (count($this->getGentils()) % count($this->getJoueurEnVie()) == 0) {
        $fin = true;
      }
    } else {
      $fin = true;
    }

    return $fin;
  }
}
