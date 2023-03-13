<?php
// utilisateur.php

class Utilisateur {
  
  private $id;
  private $nom;
  private $email;
  
  // par rapport au fichier conservatoireefrei.sql fait le getter and setter de la table personne
  public function getId() {
    return $this->ID;
  }

  public function setId($id) {
    $this->ID = $id;
  }

  public function getNom() {
    return $this->NOM;
  }

  public function setNom($nom) {
    $this->NOM = $nom;
  }

  public function getEmail() {
    return $this->MAIL;
  }

  public function setEmail($email) {
    $this->MAIL = $email;
  }




  public static function afficherUtilisateurs() {
    $req = MonPdo::getInstance()->prepare("SELECT * FROM personne");
    $req->execute();
    $lesUtilisateurs = $req->fetchAll();
    return $lesUtilisateurs;
  }
}
?>