<?php

include_once "Model.php";

class EmployeeCodeTable extends Model
{

    public function getAll()
    {
        $sql = "SELECT * FROM employee_code_table";
        $result = array();
        if ($data = $this->conn->query($sql)) {
            while ($row = $data->fetch_object()) {
                array_push($result, $row);
            }
        }
        return $result;
    }

    public function insert($code, $code_name, $domain)
    {

        if ($stmt = $this->conn->prepare(
            "INSERT INTO employee_code_table VALUES(?, ?, ?)"
        )) {
            $stmt->bind_param("sss", $code, $code_name, $domain);
            $stmt->execute();
            $stmt->close();
            return true;
        }

        $this->error_msg = $this->conn->error;
        return false;
    }
}
