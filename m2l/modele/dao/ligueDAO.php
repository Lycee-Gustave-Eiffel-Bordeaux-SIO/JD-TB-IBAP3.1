<?php

class LigueDAO{
    
    public static function lesLigues(){
        $result = [];
        
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT idLigue, nomLigue, site AS siteLigue, descriptif AS descriptifLigue FROM ligue ORDER BY nomLigue");

        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC); 

        if(!empty($liste)){
            foreach($liste as $ligue){
                $uneLigue = new Ligue(null, null, null, null); 
                $uneLigue->hydrate($ligue); 
                $result[] = $uneLigue; 
            }
        }
        return $result;
    }
    public static function createLigue($nomLigue, $site, $descriptif) {
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO ligue SET nomLigue = :nomLigue, site = :site, descriptif = :descriptif");
        $requetePrepa->bindParam(":nomLigue", $nomLigue);
        $requetePrepa->bindParam(":site", $site);
        $requetePrepa->bindParam(":descriptif", $descriptif);
        return $requetePrepa->execute();
    }

    public static function updateLigue($idLigue, $nomLigue, $site, $descriptif) {
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE ligue SET nomLigue = :nomLigue, site = :site, descriptif = :descriptif WHERE idLigue = :idLigue");
        $requetePrepa->bindParam(":nomLigue", $nomLigue);
        $requetePrepa->bindParam(":site", $site);
        $requetePrepa->bindParam(":descriptif", $descriptif);
        $requetePrepa->bindParam(":idLigue", $idLigue);
        return $requetePrepa->execute();
    }

    public static function deleteLigue($idLigue) {
        $requetePrepa = DBConnex::getInstance()->prepare("DELETE FROM ligue WHERE idLigue = :idLigue");
        $requetePrepa->bindParam(":idLigue", $idLigue);
        return $requetePrepa->execute();
    }
    public static function estSecretaire($idUtilisateur) {
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT typeUser FROM utilisateur WHERE idUser = :idUser");
        $requetePrepa->bindParam(":idUser", $idUtilisateur);
        $requetePrepa->execute();
        $resultat = $requetePrepa->fetch(PDO::FETCH_ASSOC);
        
        if ($resultat && $resultat['typeUser'] === 'Secretaire') {
            return true;
        }
        return false;
    }
}
