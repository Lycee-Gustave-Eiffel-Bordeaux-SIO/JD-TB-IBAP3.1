<?php
class ClubDAO {
    public static function lesClubs($idLigue) {
        $result = [];

        $requetePrepa = DBConnex::getInstance()->prepare("SELECT idClub, nomClub, adresseClub, idCommune, idLigue FROM club WHERE idLigue = :idLigue ORDER BY nomClub");
        $requetePrepa->bindParam(":idLigue", $idLigue, PDO::PARAM_INT);
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 

        if (!empty($liste)) {
            foreach ($liste as $club) {
                // Creation de l'objet Club avec les valeurs de la BDD
                $unClub = new Club($club['idClub'], $club['nomClub'], $club['adresseClub'], $club['idCommune'], $club['idLigue']);
                $result[] = $unClub; 
            }
        }
        return $result;
    }
    public static function tousLesClubs() {
        $result = [];

        $requetePrepa = DBConnex::getInstance()->prepare("SELECT idClub, nomClub, adresseClub, idCommune, idLigue FROM club ORDER BY nomClub");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 

        if (!empty($liste)) {
            foreach ($liste as $club) {
                // Creation de l'objet Club avec les valeurs de la BDD
                $unClub = new Club($club['idClub'], $club['nomClub'], $club['adresseClub'], $club['idCommune'], $club['idLigue']);
                $result[] = $unClub; 
            }
        }
        return $result;
    }
    public static function createClub($nomClub, $adresseClub, $nomLigue, $codePostal) {
        $db = DBConnex::getInstance();
        
        $requeteLigue = $db->prepare("SELECT idLigue FROM ligue WHERE nomLigue = :nomLigue");
        $requeteLigue->bindParam(':nomLigue', $nomLigue);
        $requeteLigue->execute();
        $idLigue = $requeteLigue->fetchColumn();
    
        $requeteCommune = $db->prepare("SELECT idCommune FROM commune WHERE codePostal = :codePostal");
        $requeteCommune->bindParam(':codePostal', $codePostal);
        $requeteCommune->execute();
        $idCommune = $requeteCommune->fetchColumn();
        
        if (!$idLigue || !$idCommune) {
            throw new Exception("Ligue ou commune introuvable.");
        }
    
        $requetePrepa = $db->prepare(
            "INSERT INTO club (nomClub, adresseClub, idCommune, idLigue) 
             VALUES (:nomClub, :adresseClub, :idCommune, :idLigue)"
        );
        $requetePrepa->bindParam(':nomClub', $nomClub);
        $requetePrepa->bindParam(':adresseClub', $adresseClub);
        $requetePrepa->bindParam(':idCommune', $idCommune);
        $requetePrepa->bindParam(':idLigue', $idLigue);
    
        return $requetePrepa->execute();
    }
    public static function updateClub($idClub, $nomClub, $adresseClub) {
        $db = DBConnex::getInstance();
    
        $requetePrepa = $db->prepare(
            "UPDATE club 
             SET nomClub = :nomClub, adresseClub = :adresseClub
             WHERE idClub = :idClub"
        );
        $requetePrepa->bindParam(':idClub', $idClub);
        $requetePrepa->bindParam(':nomClub', $nomClub);
        $requetePrepa->bindParam(':adresseClub', $adresseClub);
    
        return $requetePrepa->execute();
    }
    public static function deleteClub($idClub) {
        $db = DBConnex::getInstance();
    
        $requetePrepa = $db->prepare(
            "DELETE FROM club WHERE idClub = :idClub"
        );
        $requetePrepa->bindParam(':idClub', $idClub);
    
        return $requetePrepa->execute();
    }
    
}
