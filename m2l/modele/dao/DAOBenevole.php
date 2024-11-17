<?php
abstract class DAOBenevole{
    public static function getAllBenevoles() {
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM utilisateur /*WHERE typeUser = 'Benevole'*/");
            $requetePrepa->execute();
            $benevoles=[];
            while($row= $requetePrepa->fetchAll(PDO::FETCH_ASSOC)) {
                $benevoles = new Benevole($row["idUser"],$row["nom"],$row["prenom"],$row["login"],$row["typeUser"],$row["idLigue"],$row["idClub"],$row["idFonct"]);
            }
            return $benevoles;
    }
    
}
?>