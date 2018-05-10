<?php

class Connection {

    public $conn;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $dbname = "id5646880_pharmacare";
        $password = "dotdev";
        $this -> conn = new mysqli($servername, $username, $password, $dbname);
        if ($this -> conn->connect_error) {
            die("Connection failed: " . $this -> conn->connect_error);
        }

    }

    public function getConnection(){
        return $this -> conn;
    }

}