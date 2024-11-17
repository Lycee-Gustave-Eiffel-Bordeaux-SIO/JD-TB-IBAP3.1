<?php
/*
// models/EmployeeModel.php
class EmployeeModel {
    public function getEmployeeDetails($employeeId) {
        $query = "SELECT * FROM employees WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $employeeId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateEmployeeDetails($employeeId, $name, $address) {
        $query = "UPDATE employees SET name = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $name, $address, $employeeId);
        return $stmt->execute();
    }
}
*/?>