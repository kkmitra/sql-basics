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
    private static function GetAllDataQueryString()
    {
        return "SELECT employee_domain Domain, employee_salary Salary, employee_first_name Firstname, employee_last_name Lastname
            FROM (
            (employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) 
            INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id
            )";
    }

    public function GetData($sql) {
        $result = array();
        // if ($data = $this->conn->query($sql)) {
        //     while ($row = $data->fetch_object()) {
        //         array_push($result, $row);
        //     }
        // }
        // return $result;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    // 1
    public static function GetNameWithSalaryGt50() {
        return "SELECT T1.employee_first_name first_name from employee_details_table T1 Inner join employee_salary_table T2 on T1.employee_id = T2.employee_id where T2.employee_salary > 50";
    }

    // 2
    public static function GetNameWithPercentileGt70() {
        return "select employee_last_name from employee_details_table where graduation_percentile > 70;";
    }

    // 3
    public static function GetCodeNameWithPercentileLs70() {
        return "SELECT T1.employee_code_name  FROM ((employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id) where T3.graduation_percentile < 70;";
    }

    // 4
    public static function GetNameWithDomainNotJava() {
        return "SELECT T1.employee_code_name  FROM ((employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.employee_code = T2.employee_code) INNER JOIN employee_details_table as T3 ON T2.employee_id = T3.employee_id ) where T1.employee_domain not in (`Java`, `java`, `JAVA`)";
    }

    // 5
    private function GetDomainsWithSalary() {

    }

    // 6
    private function GetDomainsWithSalaryLs30() {

    }

    // 7
    // private function GetId



    public function getAll() {
        $result = array();
        if ($data = $this->conn->query(Query::GetAllDataQueryString())) {
            while ($row = $data->fetch_object()) {
                array_push($result, $row);
            }
        }
        return $result;
    }


}
