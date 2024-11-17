<?php

// Traitement du formulaire d'ajout de formation
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire avec vérification
    $intitule = isset($_POST['intitule']) ? $_POST['intitule'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $duree = isset($_POST['duree']) ? $_POST['duree'] : null;
    $date_ouverture = isset($_POST['date_ouverture']) ? $_POST['date_ouverture'] : null;
    $date_cloture = isset($_POST['date_cloture']) ? $_POST['date_cloture'] : null;
    $effectif_max = isset($_POST['effectif_max']) ? $_POST['effectif_max'] : null;

    // Vérifie que tous les champs obligatoires sont remplis avant d'appeler la fonction
    if ($intitule && $description && $duree && $date_ouverture && $date_cloture && $effectif_max) {
        FormationDao::AjouterFormation($intitule, $description, $duree, $date_ouverture, $date_cloture, $effectif_max);
    } else {
        echo "Erreur : tous les champs obligatoires doivent être remplis.";
    }

    header("Location: index.php?m2lMP=formationAdmin");
    exit();
}
?>
