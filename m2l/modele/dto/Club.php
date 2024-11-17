<?php
class Club{
    use Hydrate;

    private ?int $idClub;
    private ?string $nomClub;
    private ?string $adresseClub;
    private ?int $idCommuneClub;
    private ?int $idLigueClub;

    public function __construct(?string $idClub, ?string $nomClub, ?string $adresseClub, ?int $idCommuneClub, ?int $idLigueClub ){
        $this->idClub=$idClub;
        $this->nomClub=$nomClub;
        $this->adresseClub=$adresseClub;
        $this->idCommuneClub=$idCommuneClub;
        $this->idLigueClub=$idLigueClub;
    }
    //Getters

    public function getIdClub(){
        return $this->idClub;
    }
    public function getNomClub(){
        return $this->nomClub;
    }
    public function getAdresseClub(){
        return $this->adresseClub;
    }
    public function getIdCommuneClub(){
        return $this->idCommuneClub;
    }
    public function getIdLigueClub(){
        return $this->idLigueClub;
    }

    //Setters

    public function setIdClub(?string $idClub){
        $this->idClub=$idClub;
    }
    public function setNomClub(?string $nomClub){
        $this->nomClub=$nomClub;
    }
    public function setAdresseClub(?string $adresseClub){
        $this->adresseClub=$adresseClub;
    }
    public function setIdCommuneClub(?int $idCommuneClub){
        $this->idCommuneClub=$idCommuneClub;
    }
    public function setIdLigueClub(?int $idLigueClub){
        $this->idLigueClub=$idLigueClub;
    }
}