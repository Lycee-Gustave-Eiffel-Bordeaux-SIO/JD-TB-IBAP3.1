<?php
class Ligue{
    use Hydrate;

    private ?int $idLigue;
    private ?string $nomLigue;
    private ?string $siteLigue;  
    private ?string $descriptifLigue;  

    public function __construct(?int $unIdLigue, ?string $unNomLigue, ?string $unSiteLigue, ?string $unDescriptifLigue){
        $this->idLigue = $unIdLigue;
        $this->nomLigue = $unNomLigue;
        $this->siteLigue = $unSiteLigue;  
        $this->descriptifLigue = $unDescriptifLigue;  
    }

    // Getters
    public function getIdLigue(){
        return $this->idLigue;
    }

    public function getNomLigue(){
        return $this->nomLigue;
    }

    public function getSiteLigue(){
        return $this->siteLigue;  
    }

    public function getDescriptifLigue(){
        return $this->descriptifLigue;  
    }

    // Setters
    public function setIdLigue(?int $unAutreIdLigue){
        $this->idLigue = $unAutreIdLigue;
    }

    public function setNomLigue(?string $unAutreNomLigue){
        $this->nomLigue = $unAutreNomLigue;
    }

    public function setSiteLigue(?string $unAutreSiteLigue){
        $this->siteLigue = $unAutreSiteLigue;  
    }

    public function setDescriptifLigue(?string $unAutreDescriptifLigue){
        $this->descriptifLigue = $unAutreDescriptifLigue;  
    }
}
