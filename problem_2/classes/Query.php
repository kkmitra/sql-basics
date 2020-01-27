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
        return "SELECT emp_domain Domain, emp_salary Salary, emp_first_name Firstname, emp_last_name Lastname
            FROM (
            (employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.emp_code = T2.emp_code) 
            INNER JOIN employee_details_table as T3 ON T2.emp_id = T3.emp_id
            )";
    }

    public function getAll()
    {
        $result = $this->getData(Query::GetAllDataQueryString());
        $data = array_map(function ($value) {
            return array($value["Firstname"], $value["Lastname"], $value["Salary"], $value["Domain"]);
        }, $result);
        $columns = array("Firstname", "Lastname", "Salary", "Domain");
        return array($data, $columns);
    }

    // 1
    private static function GetNameWithSalaryGt50Query()
    {
        return "SELECT T1.emp_first_name first_name from employee_details_table T1 Inner join employee_salary_table T2 on T1.emp_id = T2.emp_id where T2.emp_salary > 50";
    }

    public function GetNameWithSalaryGt50()
    {
        $result = $this->getData(Query::GetNameWithSalaryGt50Query());
        $data = array_map(function ($value) {
            return array($value["first_name"]);
        }, $result);
        $columns = array("Firstname");
        return array($data, $columns);
    }



    // 2
    private static function GetNameWithPercentileGt70Query()
    {
        return "select emp_last_name last_name from employee_details_table where graduation_percentile > 70;";
    }

    public function GetNameWithPercentileGt70()
    {
        $result = $this->getData(Query::GetNameWithPercentileGt70Query());
        $data = array_map(function ($value) {
            return array($value["last_name"]);
        }, $result);
        $columns = array("Lastname");
        return array($data, $columns);
    }

    // 3
    private static function GetCodeNameWithPercentileLs70Query()
    {
        return "SELECT T1.emp_code_name code_name  FROM ((employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.emp_code = T2.emp_code) INNER JOIN employee_details_table as T3 ON T2.emp_id = T3.emp_id) where T3.graduation_percentile < 70;";
    }

    public function GetCodeNameWithPercentileLs70()
    {
        $result = $this->getData(Query::GetCodeNameWithPercentileLs70Query());
        $data = array_map(function ($value) {
            return array($value["code_name"]);
        }, $result);
        $columns = array("Code name");
        return array($data, $columns);
    }

    // 4
    private static function GetNameWithDomaNotInJavaQuery()
    {
        return "SELECT concat(T3.emp_first_name, ' ', T3.emp_last_name) Fullname  FROM ((employee_code_table as T1 INNER JOIN employee_salary_table as T2 ON T1.emp_code = T2.emp_code) INNER JOIN employee_details_table as T3 ON T2.emp_id = T3.emp_id ) where T1.emp_domain not in ('Java', 'java', 'JAVA')";
    }

    public function GetNameWithDomainNotJava()
    {
        $result = $this->getData(Query::GetNameWithDomaNotInJavaQuery());
        $data = array_map(function ($value) {
            return array($value["Fullname"]);
        }, $result);
        $columns = array("Fullname");
        return array($data, $columns);
    }

    // 5
    private static function GetDomainsWithSalaryQuery()
    {
        return "select emp_domain Domain, sum(emp_salary) Salary from employee_code_table T1 Inner Join employee_salary_table T2 on T1.emp_code=T2.emp_code group by emp_domain order by Salary DESC;";
    }

    public function GetDomainsWithSalary()
    {
        $result = $this->getData(Query::GetDomainsWithSalaryQuery());
        $data = array_map(function ($value) {
            return array($value["Domain"], $value["Salary"]);
        }, $result);
        $columns = array("Domain", "Salary");
        return array($data, $columns);
    }

    // 6
    private static function GetDomainsWithSalaryLs30Query()
    {
        return "select emp_domain Domain, sum(emp_salary) Salary from employee_code_table T1 Inner Join employee_salary_table T2 on T1.emp_code=T2.emp_code where emp_salary < 30 group by emp_domain order by Salary DESC;";
    }

    public function GetDomainsWithSalaryLs30()
    {
        $result = $this->getData(Query::GetDomainsWithSalaryLs30Query());
        $data = array_map(function ($value) {
            return array($value["Domain"], $value["Salary"]);
        }, $result);
        $columns = array("Domain", "Salary");
        return array($data, $columns);
    }

    // 7
    private static function GetIdWhereEmpCodeIsNullQuery() {
        return "select concat(emp_id_prefix, '_', emp_id) ID from employee_salary_table where emp_code is null;";
    }

    public function GetIdWhereEmpCodeIsNull()
    {
        $result = $this->getData(Query::GetIdWhereEmpCodeIsNullQuery());
        $data = array_map(function ($value) {
            return array($value["ID"]);
        }, $result);
        $columns = array("ID");
        return array($data, $columns);
    }



}
