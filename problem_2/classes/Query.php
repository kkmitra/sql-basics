<?php

/*
// GET ALL DATA
SELECT * 
FROM (
    (employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) 
    INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id
);

// Get name with salary > 50
SELECT T1.employee_first_name first_name from employee_details_table T1 Inner join employee_salary_table T2 on T1.employee_id = T2.employee_id where T2.employee_salary > 50;

// 3
select employee_last_name from employee_details_table where graduation_percentile > 70;

// 4


*/

include_once "Model.php";

class Query extends Model
{
    // 0 -> get all values;
    private static function GetAllDataQueryString()
    {
        return "SELECT employee_domain Domain, employee_salary Salary, employee_first_name Firstname, employee_last_name Lastname
            FROM (
            (employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) 
            INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id
            )";
    }

    public function getAll()
    {
        $data = array();
        $columns = array("Firstname", "Lastname", "Salary", "Domain");
        if ($result = $this->conn->query(Query::GetAllDataQueryString())) {
            while ($row = $result->fetch_object()) {
                array_push($data, array(
                    $row->Firstname,
                    $row->Lastname,
                    $row->Salary,
                    $row->Domain
                ));
            }
        }
        return array($data, $columns);
    }

    // 1
    private static function GetNameWithSalaryGt50Query()
    {
        return "SELECT T1.employee_first_name first_name from employee_details_table T1 Inner join employee_salary_table T2 on T1.employee_id = T2.employee_id where T2.employee_salary > 50";
    }

    public function GetNameWithSalaryGt50()
    {
        $data = array();
        $columns = array("Firstname");
        if ($result = $this->conn->query(Query::GetNameWithSalaryGt50Query())) {
            while ($row = $result->fetch_object()) {
                array_push($data, array($row->first_name));
            }
        }
        return array($data, $columns);
    }



    // 2
    private static function GetNameWithPercentileGt70Query()
    {
        return "select employee_last_name last_name from employee_details_table where graduation_percentile > 70;";
    }

    public function GetNameWithPercentileGt70()
    {
        $data = array();
        $columns = array("Lastname");
        if ($result = $this->conn->query(Query::GetNameWithPercentileGt70Query())) {
            while ($row = $result->fetch_object()) {
                array_push($data, array($row->last_name));
            }
        }
        return array($data, $columns);
    }

    // 3
    private static function GetCodeNameWithPercentileLs70Query()
    {
        return "SELECT T1.employee_code_name code_name  FROM ((employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id) where T3.graduation_percentile < 70;";
    }

    public function GetCodeNameWithPercentileLs70() {
        $data = array();
        $columns = array("Code name");
        if ($result = $this->conn->query(Query::GetCodeNameWithPercentileLs70Query())) {
            while ($row = $result->fetch_object()) {
                array_push($data, array($row->code_name));
            }
        }
        return array($data, $columns);

    }

    // 4
    private static function GetNameWithDomaNotInJavaQuery()
    {
        return "SELECT T1.employee_code_name code_name  FROM ((employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id ) where T1.employee_domain not in ('Java', 'java', 'JAVA')";
    }

    public function GetNameWithDomainNotJava() {
        $data = array();
        $columns = array("Code name");
        if ($result = $this->conn->query(Query::GetNameWithDomaNotInJavaQuery())) {
            while ($row = $result->fetch_object()) {
                array_push($data, array($row->code_name));
            }
        } else {
            print_r($this->conn->error);
        }
        return array($data, $columns);
    }

    // 5
    private function GetDomainsWithSalary()
    {
    }

    // 6
    private function GetDomainsWithSalaryLs30()
    {
    }

    // 7
    // private function GetId


}
