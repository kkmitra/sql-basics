<?php

include_once "Model.php";

class EmployeeSalaryTable extends Model
{

    public function getAll()
    {
        $sql = "SELECT * FROM employee_salary_table";
        $result = array();
        if ($data = $this->conn->query($sql)) {
            while ($row = $data->fetch_object()) {
                array_push($result, $row);
            }
        }
        return $result;
    }

    public function insert($id, $salary, $code)
    {

        if ($stmt = $this->conn->prepare(
            "INSERT INTO employee_salary_table VALUES(?, ?, ?)"
        )) {
            $stmt->bind_param("sss", $id, $salary, $code);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        $this->error_msg = $this->conn->error;
        return false;
    }
}
