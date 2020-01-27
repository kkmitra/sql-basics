<?php

include_once "Model.php";

class EmployeeCodeTable extends Model
{
    public function insert($code, $code_name, $domain)
    {

        // if ($stmt = $this->conn->prepare(
        //     "INSERT INTO employee_code_table VALUES(?, ?, ?)"
        // )) {
        //     $stmt->bind_param("sss", $code, $code_name, $domain);
        //     $stmt->execute();
        //     $stmt->close();
        //     return true;
        // }

        // $this->error_msg = $this->conn->error;
        // return false;
        return $this->insertData(
            "INSERT INTO employee_code_table VALUES(?, ?, ?)", "sss", array($code, $code_name, $domain)
        );
    }
}
