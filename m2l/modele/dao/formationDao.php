<?php
class FormationDao { 
    
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//  function GET !
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------


public static function getFormationById($idForma) {
    $pdo = DBConnex::getInstance();
    $sql = "SELECT * FROM formation WHERE idForma = :idForma";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idForma' => $idForma]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        // Créez et retournez un objet Formation ici avec les données récupérées
        return new Formation(
            $result['idForma'], 
            $result['intitule'], 
            $result['descriptif'], 
            $result['duree'], 
            $result['dateOuvertInscriptions'], 
            $result['dateClotureInscriptions'], 
            $result['effectifMax'], 
            $result['effectifActuel']
        );
    }
    return null;
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function getAllFormation() { 

        $resultObj = [];

        $pdo = DBConnex::getInstance();

        $sql = "SELECT * FROM formation";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach( $result as $uneFormation){
            $formation = new Formation("0","test", "test", 0, new DateTime(), new DateTime(), 1, 1);
            $formation->hydrate($uneFormation);

            $resultObj[] = $formation;
            $formation = null;
        }
        return $resultObj;
    }

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function getAllWhereIsRegistered($idUser) { 

        $pdo = DBConnex::getInstance();

        $sql = "SELECT idForma FROM inscrit_a WHERE idUser = :idUser";

        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([':idUser' => $idUser]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function getEtatFormation($idUser, $idForma) {

        $pdo = DBConnex::getInstance();

        $sql = "SELECT Etats FROM inscrit_a WHERE idUser = :idUser AND idForma = :idForma";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser, ':idForma' => $idForma]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return $result['Etats'];
        }
        
        return null;
    }

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function getEtatFormationAndWhrite($idUser, $idForma) {

        $pdo = DBConnex::getInstance();
    
        $sql = "SELECT Etats FROM inscrit_a WHERE idUser = :idUser AND idForma = :idForma";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser, ':idForma' => $idForma]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result == null) {
            return "Non inscrit";
        } elseif ($result['Etats'] == 1) {
            return "En attente";
        } elseif ($result['Etats'] == 2) {
            return "Accepté";
        } elseif ($result['Etats'] == 3) {
            return "Refusé";
        } else {
            return "Statut inconnu";
        }
    }


    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function getAllFormationWithIdUser($idUser) {

        $pdo = DBConnex::getInstance();

        $sql = "SELECT * FROM inscrit_a WHERE idUser = :idUser";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser]);
        $result = $stmt->fetch(PDO::FETCH_NUM);

        return $result;
    }

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public static function getStatu($idUser) {

    $pdo = DBConnex::getInstance();

    $sql = "SELECT typeUser FROM utilisateur WHERE idUser = :idUser";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idUser' => $idUser]);
    $result = $stmt->fetch(PDO::FETCH_NUM);

    // Retourne la valeur de 'typeUser' directement
    return $result ? $result[0] : null;
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public static function getInscriptionsByFormation($idForma) {

    $pdo = DBConnex::getInstance();

    $sql = "SELECT * FROM inscrit_a WHERE idForma = :idForma"; // Table des demandes d'inscription
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idForma' => $idForma]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne toutes les demandes d'inscription
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public static function getNomUser($idUser) {

    $pdo = DBConnex::getInstance();

    $sql = "SELECT nom FROM utilisateur WHERE idUser = :idUser";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idUser' => $idUser]);
    $result = $stmt->fetch(PDO::FETCH_NUM);

    return $result ? $result[0] : null;
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public static function getPrenomUser($idUser) {

    $pdo = DBConnex::getInstance();

    $sql = "SELECT prenom FROM utilisateur WHERE idUser = :idUser";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':idUser' => $idUser]);
    $result = $stmt->fetch(PDO::FETCH_NUM);

    return $result ? $result[0] : null;
}



//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//  function INSERT + DELETE !
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function inscriptionFormation($idUser, $idForma) {

        $pdo = DBConnex::getInstance();

        $sql = "INSERT INTO inscrit_a VALUES(:idUser, :idForma, 1)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser, ':idForma' => $idForma]);
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public static function desinscriptionFormation($idUser, $idForma) {

        $pdo = DBConnex::getInstance();

        $sql = "DELETE FROM inscrit_a WHERE idUser = :idUser AND idForma = :idForma";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser, ':idForma' => $idForma]);
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------    

    public static function acceptInscription($idUser, $idForma) {

        $pdo = DBConnex::getInstance();

        $sql = "UPDATE inscrit_a SET Etats = 2 WHERE idUser = :idUser AND idForma = :idForma";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser, ':idForma' => $idForma]);
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    
    public static function refusInscription($idUser, $idForma) {

        $pdo = DBConnex::getInstance();
            
        $sql = "UPDATE inscrit_a SET Etats = 3 WHERE idUser = :idUser AND idForma = :idForma";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idUser' => $idUser, ':idForma' => $idForma]);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------  
    
    public static function AjouterFormation($intitule, $description, $duree, $date_ouvertur, $date_cloture, $effectif_max){

        $pdo = DBConnex::getInstance();

        $sql = "INSERT INTO formation (intitule, descriptif, duree, dateOuvertInscriptions, dateClotureInscriptions, effectifMax, effectifActuel) 
                VALUES (:intitule, :description, :duree, :date_ouvertur, :date_cloture, :effectif_max, 0)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':intitule' => $intitule, ':description' => $description, ':duree' => $duree, ':date_ouvertur' => $date_ouvertur, 
                        ':date_cloture' => $date_cloture, ':effectif_max' => $effectif_max]);
    }

   //------------------------------------------------------------------------------------------------------------------------------------------------------------------------  

    public static function SupprimerFormation($idForma) {

        $pdo = DBConnex::getInstance();
    
        $sql = "DELETE FROM formation WHERE idForma = :idForma";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':idForma' => $idForma]);
    }

  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------  

    public static function ModifierFormation($idForma, $intitule, $description, $duree, $date_ouverture, $date_cloture, $effectif_max) {

        $pdo = DBConnex::getInstance();
    
        $sql = "UPDATE formation
                SET intitule = :intitule,
                    descriptif = :description,
                    duree = :duree,
                    dateOuvertInscriptions = :date_ouverture,
                    dateClotureInscriptions = :date_cloture,
                    effectifMax = :effectif_max
                WHERE idForma = :idForma";
        
        $stmt = $pdo->prepare($sql);
    
        $stmt->execute([
            ':idForma' => $idForma,
            ':intitule' => $intitule,
            ':description' => $description,
            ':duree' => $duree,
            ':date_ouverture' => $date_ouverture,
            ':date_cloture' => $date_cloture,
            ':effectif_max' => $effectif_max
        ]);
    }
    
}
