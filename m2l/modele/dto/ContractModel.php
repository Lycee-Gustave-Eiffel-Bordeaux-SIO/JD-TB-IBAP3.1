<?php
/*class ContractModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Fonction pour récupérer les contrats d'un salarié
    public function getContractsByEmployee($employeeId) {
        $query = "SELECT * FROM contracts WHERE employee_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $employeeId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(bdd_ap3.1);
    }
}*/
?>