<?php

// Traitement du formulaire d'ajout de formation
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $idForma = isset($_POST['id_delete']) ? $_POST['id_delete'] : null;

    if ($idForma) {
        FormationDao::SupprimerFormation($idForma);
    } else {
        echo "Erreur : tous les champs obligatoires doivent être remplis.";
    }

    header("Location: index.php?m2lMP=formationAdmin");
    exit();
}
?>
