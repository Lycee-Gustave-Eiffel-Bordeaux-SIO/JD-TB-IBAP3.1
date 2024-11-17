<?php
$idUser = $_SESSION['identification'];
$_SESSION['allFormation'] = FormationDAO::getAllFormationWithIdUser($idUser);

$toRender = "";

// Récupérer uniquement les formations où l'utilisateur est inscrit
$formationsInscrites = FormationDAO::getAllWhereIsRegistered($idUser); // Cette méthode doit retourner les formations inscrites

foreach ($formationsInscrites as $formationId) {
    $formation = FormationDAO::getFormationById($formationId); // Récupère l'objet Formation
    if ($formation) {
        $idForma = $formation->getIdForma(); // Maintenant, $formation est bien un objet avec getIdForma()
        $etatFormation = FormationDAO::getEtatFormationAndWhrite($idUser, $idForma); // Récupération de l'état de la formation

        $toRender .= '<div class="container">';
        $toRender .= '<div class="item">' . $formation->getIdForma() . '</div>';
        $toRender .= '<div class="item">' . $formation->getIntitule() . '</div>';
        $toRender .= '<div class="item">' . $formation->getDescriptif() . '</div>';
        $toRender .= '<div class="item">' . $formation->getDuree() . '</div>';
        $toRender .= '<div class="item">' . $formation->getDateOuvertInscriptions() . '</div>';
        $toRender .= '<div class="item">' . $formation->getDateClotureInscriptions() . '</div>';
        $toRender .= '<div class="item">' . $formation->getEffectifMax() . '</div>';
        $toRender .= '<div class="item">' . $formation->getEffectifActuel() . '</div>';
        $toRender .= '<div class="item">' . $etatFormation . '</div>'; // Affichage de l'état de la formation
        $toRender .= '</div>';
    }
}

// Charge la vue et affiche les formations inscrites
require_once 'vue/vueMesFormations.php';

function isRegistered($formation) {
    global $formationsInscrites;
    return in_array($formation->getIdForma(), $formationsInscrites);
}