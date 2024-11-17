<?php

$idUser = $_SESSION['identification'];
$_SESSION['allFormation']=FormationDAO::getAllFormation(); 

$toRender = "";

$formationsWhereIsRegistered = FormationDao::getAllWhereIsRegistered($_SESSION['identification']);

function isRegistered($formation) {
    global $formationsWhereIsRegistered;
    return in_array($formation->getIdForma(), $formationsWhereIsRegistered);
}

foreach ($_SESSION['allFormation'] as $formation) {
    $idForma = $formation->getIdForma();
    $etatFormation = FormationDao::getEtatFormationAndWhrite($idUser, $idForma);
    
    $toRender .= '<div class="container">';
    $toRender .= '<div class="item">' . $formation->getIdForma() . '</div>';
    $toRender .= '<div class="item">' . $formation->getIntitule() . '</div>';
    $toRender .= '<div class="item">' . $formation->getDescriptif() . '</div>';
    $toRender .= '<div class="item">' . $formation->getDuree() . '</div>';
    $toRender .= '<div class="item">' . $formation->getDateOuvertInscriptions() . '</div>';
    $toRender .= '<div class="item">' . $formation->getDateClotureInscriptions() . '</div>';
    $toRender .= '<div class="item">' . $formation->getEffectifMax() . '</div>';
    $toRender .= '<div class="item">' . $formation->getEffectifActuel() . '</div>';
    $toRender .= '</div>';
    
    // Afficher les demandes d'inscription pour cette formation
    $inscriptions = FormationDao::getInscriptionsByFormation($idForma);
    foreach ($inscriptions as $inscription) {
        $idUser = $inscription['idUser'];
        
        // Récupérer l'état de l'inscription
        $etat = FormationDao::getEtatFormation($idUser, $idForma);
        
        // Vérifier si l'état est 1 (en attente)
        if ($etat == 1) {
            $toRender .= '<div class="container inscription">';
            $toRender .= '<div class="item">Demande de : ' . FormationDAO::getNomUser($idUser) . ' ' . FormationDAO::getPrenomUser($idUser) . '</div>';
    
            // Formulaire pour Accepter
            $toRender .= '<form method="POST" action="index.php?m2lMP=accepte_formation">';
            $toRender .= '<input type="hidden" name="idUser" value="' . $idUser . '">';
            $toRender .= '<input type="hidden" name="idForma" value="' . $idForma . '">';
            $toRender .= '<button type="submit" name="action" value="accept">Accepter</button>';
            $toRender .= '</form>';
    
            // Formulaire pour Refuser
            $toRender .= '<form method="POST" action="index.php?m2lMP=refus_formation">';
            $toRender .= '<input type="hidden" name="idUser" value="' . $idUser . '">';
            $toRender .= '<input type="hidden" name="idForma" value="' . $idForma . '">';
            $toRender .= '<button type="submit" name="action" value="refuse">Refuser</button>';
            $toRender .= '</form>';
    
            $toRender .= '</div>';
        }
    }

}

require_once 'vue/vueFormationAdmin.php';