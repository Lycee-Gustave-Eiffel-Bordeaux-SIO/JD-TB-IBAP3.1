<?php

$idUser = $_SESSION['identification'];
$_SESSION['allFormation']=FormationDAO::getAllFormation(); 

$toRender = "";

$formationsWhereIsRegistered = FormationDao::getAllWhereIsRegistered($_SESSION['identification']);

function isRegistered($formation) {
    global $formationsWhereIsRegistered;
    return in_array($formation->getIdForma(), $formationsWhereIsRegistered);
}

foreach( $_SESSION['allFormation'] as $formation){

    $idForma = $formation->getIdForma(); // Récupère l'ID de la formation
    $etatFormation = FormationDao::getEtatFormationAndWhrite($idUser, $idForma); // Récupère l'état d'inscription

    $toRender .= '<div class="container">
        <div class="item">'.$formation->getIdForma()  .'</div>
        <div class="item">'.$formation->getIntitule()  .'</div>
        <div class="item">'.$formation->getDescriptif()  .'</div>
        <div class="item">'.$formation->getDuree()  .'</div>
        <div class="item">'.$formation->getDateOuvertInscriptions()  .'</div>
        <div class="item">'.$formation->getDateClotureInscriptions()  .'</div>
        <div class="item">'.$formation->getEffectifMax()  .'</div>
        <div class="item">'.$formation->getEffectifActuel()  .'</div>';

    if (!isRegistered($formation)){
        $toRender .= '<div class="item"><form id="inscription_formation" name="inscription_formation" method="POST" action="index.php?m2lMP=inscriptionFormation">
        <input type="hidden" name="idForma" id="idForma" value="'.$formation->getIdForma().'"/>
        <button type="submit">S\'inscrire</button></form></div>';
    } else {
        $toRender .= '<div class="item"><form id="inscription_formation" name="inscription_formation" method="POST" action="index.php?m2lMP=DesinscriptionFormation">
        <input type="hidden" name="idForma" id="idForma" value="'.$formation->getIdForma().'"/>
        <button type="submit">Se désinscrire</button></form></div>';
    }

 
    $toRender .= '<div class="item">' . $etatFormation . '</div>'; // Affichage de l'état de la formation
    $toRender .= '</div>';

}

require_once 'vue/vueFormation.php';