<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idUser = $_POST['idUser'];
    $idForma = $_POST['idForma'];

    // Appelle la méthode pour accepter l'inscription
    FormationDao::acceptInscription($idUser, $idForma);

    header("Location: index.php?m2lMP=formationAdmin");
    exit();
}