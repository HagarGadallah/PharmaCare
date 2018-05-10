<?php
session_start();
include_once "Connection.php";
include "Prescription.php";

class PrescriptionManagement{
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

    function addMedicine($presID, $medicineID){
        $res = $this -> conn -> query("INSERT INTO PrescriptionMedicine VALUES({$presID}, {$medicineID})");

    }

    function show($id){
        $Pharmacy = new Pharmacy();
        $med = $this -> conn -> query("SELECT * FROM Pharmacy WHERE id={$id}");
        $res = $med -> fetch_assoc();
        $Pharmacy -> id = $res['id'];
        $Pharmacy -> pharmacyName = $res['pharmacyName'];
        return $Pharmacy;
    }

    function store($prescription){
        $this -> conn -> query("INSERT INTO Prescription VALUES(NULL, {$prescription -> userIDDr}, {$prescription -> userIDNormal})");
        return $this -> conn -> insert_id;
    }

    function getPrescriptions($id){
        $res = $this -> conn -> query("SELECT * FROM Prescription WHERE userIDNormal={$id}");
        return $res;
    }

    function getMedicines($presID){
        $res = $this -> conn -> query("SELECT * FROM PrescriptionMedicine WHERE prescriptionID={$presID}");
        return $res;
    }

}