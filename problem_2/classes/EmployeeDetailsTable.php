<?php

include_once "Model.php";

class EmployeeDetailsTable extends Model {

    public function getAll() 
    {
        $sql = "SELECT * FROM employee_details_table";
        $result = array();
        if ($data = $this->conn->query($sql)) {
            while ($row = $data->fetch_object()) {
                array_push($result, $row);
            }
        }
        return $result;
    }

    public function insert($id, $first_name, $last_name, $percentile) {

        if ($stmt = $this->conn->prepare(
            "INSERT INTO employee_details_table VALUES(?, ?, ?, ?)"
        )) {
            $stmt->bind_param("ssss", $id, $first_name, $last_name, $percentile);
            $stmt->execute();
            $stmt->close();
            return true;
        }

        echo $this->conn->error . "<br>";
        $this->error_msg = $this->conn->error;
        return false;

    }

    
}