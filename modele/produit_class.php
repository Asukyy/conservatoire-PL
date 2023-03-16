<?php
class Produit{
    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $mail;
    private $adresse;


public function getId(){
    return $this->ID;
}

public function getNom(){
    return $this->NOM;
}

public function getPrenom(){
    return $this->PRENOM;
}

public function getTel(){
    return $this->TEL;
}

public function getMail(){
    return $this->MAIL;
}

public function getAdresse(){
    return $this->ADRESSE;
}

public function setId($id){
    $this->ID = $id;
}

public function setNom($nom){
    $this->NOM = $nom;
}

public function setPrenom($prenom){
    $this->PRENOM = $prenom;
}

public function setTel($tel){
    $this->TEL = $tel;
}

public function setMail($mail){
    $this->MAIL = $mail;
}

public function setAdresse($adresse){
    $this->ADRESSE = $adresse;
}

public function __toString(){
    return "id: " . $this->id . "nom: " . $this->nom . "prenom: " . $this->prenom . "tel: " . $this->tel . "mail: " . $this->mail . "adresse: " . $this->adresse;
}

public static function afficherTousLesProduits(){
    $req = MonPdo::getInstance()->prepare("SELECT * FROM conservatoireefrei");
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::PROPS_LATE, 'Personne');
    $req->execute();
    $lesProduits = $req->fetchAll();
    return $lesProduits;
}
}
?>
