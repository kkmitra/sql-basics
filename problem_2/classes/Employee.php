<?php

include_once "EmployeeCodeTable.php";
include_once "EmployeeDetailsTable.php";
include_once "EmployeeSalaryTable.php";

class Employee
{
    private $first_name;
    private $last_name;
    private $salary;
    private $percentile;
    private $domain;
    private $code_name;
    private $id;
    private $code;

    private $salary_table;
    private $code_table;
    private $details_table;

    public $error_msg;

    public function __construct($form_array)
    {
        $this->first_name = trim($form_array["first_name"]);
        $this->last_name = trim($form_array["last_name"]);
        $this->salary = trim($form_array["salary"]);
        $this->percentile = trim($form_array["percentile"]);
        $this->domain = trim($form_array["domain"]);
        $this->code_name = trim($form_array["code_name"]);
        $this->id = trim($form_array["id"]);
        $this->code = "su_" . strtolower($this->first_name);

        $this->salary_table = new EmployeeSalaryTable();
        $this->code_table = new EmployeeCodeTable();
        $this->details_table = new EmployeeDetailsTable();
    }

    public function validate()
    {

        if (
            $this->first_name == "" ||
            $this->first_name = "" ||
            $this->last_name = "" ||
            $this->salary = "" ||
            $this->percentile = "" ||
            $this->domain = "" ||
            $this->code_name = "" ||
            $this->id = ""
        ) {
            $this->error_msg = "All fields must be filled";
            return false;
        }

        return true;
    }

    public function insert()
    {
        echo $this->first_name . "<br>";
        echo $this->first_name . "<br>";
        echo $this->last_name . "<br>";
        echo $this->salary . "<br>";
        echo $this->percentile . "<br>";
        echo $this->domain . "<br>";
        echo $this->code_name . "<br>";
        echo $this->id . "<br>";
        echo "1";
        // if (!$this->validate()) {
        //     return false;
        // }


        echo "2";

        if (!$this->code_table->insert($this->code, $this->code_name, $this->domain)) {
            $this->error_msg = $this->code_table->error_msg;
            return false;
        }

        echo "3";

        if (!$this->salary_table->insert($this->id, $this->salary, $this->code)) {
            $this->error_msg = $this->salary_table->error_msg;
            return false;
        }

        echo "4";

        if (!$this->details_table->insert($this->id, $this->first_name, $this->last_name, $this->percentile)) {
            $this->error_msg = $this->details_table->error_msg;
            return false;
        }


        echo "5";
        return true;
    }
}
