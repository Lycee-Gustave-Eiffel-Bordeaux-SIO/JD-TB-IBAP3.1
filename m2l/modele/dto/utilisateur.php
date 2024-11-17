<?php
require_once 'modele/traits/Hydrate.php';
class Benevole {
    use Hydrate;

    private int $idUser;
    private String $nom;
    private String $prenom;
    private String $login;
    private String $typeUser;
    private int $idLigue;
    private int $idClub;
    private int $idFonct;

    public function __construct(int $idUser ,String $nom ,String $prenom ,String $login ,String $typeUser ,int $idLigue ,int $idClub ,int $idFonct){
        $this->idUser = $idUser;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->typeUser = $typeUser;
        $this->idLigue = $idLigue;
        $this->idClub = $idClub;
        $this->idFonct = $idFonct;
    }
    public function getIdUser(){
        return $this->idUser;  
    }
    public function getNom(){
        return $this->nom;  
    }
    public function getPrenom(){
        return $this->prenom;  
    }
    public function getLogin(){
        return $this->login;  
    }
    public function getTypeUser(){
        return $this->typeUser;  
    }
    public function getIdLigue(){
        return $this->idLigue;  
    }
    public function getIdClub(){
        return $this->idClub;  
    }
    public function getIdFonct(){
        return $this->idFonct;  
    }
    public function setIdUser($unAutreIdUser){
        $this->idUser = $unAutreIdUser;
    }
    public function setNom($unAutreNom){
        $this->nom = $unAutreNom;
    }
    public function setPrenom($unAutrePrenom){
        $this->prenom = $unAutrePrenom;
    }
    public function setLogin($unAutreLogin){
        $this->login = $unAutreLogin;
    }
    public function setTypeUser($unAutreTypeUser){
        $this->typeUser = $unAutreTypeUser;
    }
    public function setIdLigue($unAutreIdLigue){
        $this->idLigue = $unAutreIdLigue;
    }
    public function setIdClub($unAutreIdClub){
        $this->idClub = $unAutreIdClub;
    }
    public function setIdFonct($unAutreIdFonct){
        $this->idFonct = $unAutreIdFonct;
    }
}