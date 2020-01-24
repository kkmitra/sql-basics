<?php

class Model
{
    private $host = "localhost";
    private $password = "admin";
    private $user = "kau";
    private $dbname = "sql-basics";

    public $error_msg = "";

    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
    }

    protected function getdata()
    {
    }
}
