<?php
include_once 'modele/dao/DAOBenevole.php';
require_once 'vue/vueBenevole.php';
class BenevoleController {
    private $benevoleModel;
  

    public function __construct($db) {
        $this->benevoleModel = new DAOBenevole();

    }

    public function index() { 
        $benevoles = $this->benevoleModel->getAllBenevoles();
        require_once 'vue/vueBenevole.php';

    }
}

$benevolesListe = DAOBenevole::getAllBenevoles();
foreach($benevolesListe as $benevole){
    echo $benevole;
}


