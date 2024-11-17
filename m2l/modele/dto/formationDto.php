<?php
class Formation
{
    use Hydrate;
    
    private $idForma;
    private $intitule;
    private $descriptif;
    private $duree;
    private $dateOuvertInscriptions;
    private $dateClotureInscriptions;
    private $effectifMax;
    private $effectifActuel;

    // Constructeur
    public function __construct($idForma, $intitule, $descriptif, $duree, $dateOuvertInscriptions, $dateClotureInscriptions, $effectifMax, $effectifActuel)
    {
        $this->idForma = $idForma;
        $this->intitule = $intitule;
        $this->descriptif = $descriptif;
        $this->duree = $duree;
        $this->dateOuvertInscriptions = $dateOuvertInscriptions;
        $this->dateClotureInscriptions = $dateClotureInscriptions;
        $this->effectifMax = $effectifMax;
        $this->effectifActuel = $effectifActuel;
    }

    // Getters et setters
    public function getIdForma() { return $this->idForma; }
    public function getIntitule() { return $this->intitule; }
    public function getDescriptif() { return $this->descriptif; }
    public function getDuree() { return $this->duree; }
    public function getDateOuvertInscriptions() { return $this->dateOuvertInscriptions; }
    public function getDateClotureInscriptions() { return $this->dateClotureInscriptions; }
    public function getEffectifMax() { return $this->effectifMax; }
    public function getEffectifActuel() { return $this->effectifActuel; }

    public function setIdForma($idForma) { $this->idForma = $idForma; }
    public function setIntitule($intitule) { $this->intitule = $intitule; }
    public function setDescriptif($descriptif) { $this->descriptif = $descriptif; }
    public function setDuree($duree) { $this->duree = $duree; }
    public function setDateOuvertInscriptions($dateOuvertInscriptions) { $this->dateOuvertInscriptions = $dateOuvertInscriptions; }
    public function setDateClotureInscriptions($dateClotureInscriptions) { $this->dateClotureInscriptions = $dateClotureInscriptions; }
    public function setEffectifMax($effectifMax) { $this->effectifMax = $effectifMax; }
    public function setEffectifActuel($effectifActuel) { $this->effectifActuel = $effectifActuel; }
}