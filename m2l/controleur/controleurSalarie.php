<?php
class SalarieController {


/*class ContratController {
    public function liste($userId) {
        global $pdo;

        // Récupérer les contrats de l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM contrats WHERE user_id = ?");
        $stmt->execute([$userId]);
        $contrats = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Pour chaque contrat, récupérer les bulletins associés
        foreach ($contrats as $contrat) {
            $stmt = $pdo->prepare("SELECT * FROM bulletins WHERE contrat_id = ?");
            $stmt->execute([$contrat->id]);
            $contrat->bulletins = $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Inclure la vue
        include 'views/liste_contrats.php';
    }
}*/

}
require_once 'vue/vueSalarie.php';
?>