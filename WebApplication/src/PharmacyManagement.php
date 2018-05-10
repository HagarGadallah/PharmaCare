<?php
include_once "Connection.php";
include "Pharmacy.php";

class PharmacyManagement{
    private $conn;

    function __construct()
    {
        $obj = new Connection();
        $this -> conn = $obj -> getConnection();
    }

    function index(){
        $res = $this -> conn -> query("SELECT * FROM Pharmacy");
        $pharmacies = array();
        $i = 0;
        while($med = $res -> fetch_assoc()){
            $pharmacies[$i] = new Pharmacy();
            $pharmacies[$i] -> id = $med['id'];
            $pharmacies[$i] -> pharmacyName = $med['pharmacyName'];
            $i++;

        }
        return $pharmacies;
    }

    function show($id){
        $Pharmacy = new Pharmacy();
        $med = $this -> conn -> query("SELECT * FROM Pharmacy WHERE id={$id}");
        $res = $med -> fetch_assoc();
        $Pharmacy -> id = $res['id'];
        $Pharmacy -> pharmacyName = $res['pharmacyName'];
        return $Pharmacy;
    }

    function store($Pharmacy){
        $this -> conn -> query("INSERT INTO Pharmacy VALUES(NULL, '{$Pharmacy -> pharmacyName}')");
    }

    function update($Pharmacy, $id){
        $this -> conn -> query("UPDATE Pharmacy SET pharmacyName='{$Pharmacy -> pharmacyName}' WHERE id={$id}");
    }

    function delete($id){
        $this -> conn -> query("DELETE FROM Pharmacy WHERE id={$id}");
    }
}