<?php
include_once "Connection.php";
include "Medicine.php";

class MedicineManagement{
    private $conn;

    function __construct()
    {
        $obj = new Connection();
        $this -> conn = $obj -> getConnection();
    }

    function index(){
        $res = $this -> conn -> query("SELECT * FROM Medicine");
        $medicines = array();
        $i = 0;
        while($med = $res -> fetch_assoc()){
            $medicines[$i] = new Medicine();
            $medicines[$i] -> id = $med['id'];
            $medicines[$i] -> medicineName = $med['medicineName'];
            $medicines[$i] -> price = $med['price'];
            $i++;

        }
        return $medicines;
    }

    function show($id){
        $medicine = new Medicine();
        $med = $this -> conn -> query(addslashes("SELECT * FROM Medicine WHERE id={$id}"));
        $res = $med -> fetch_assoc();
        $medicine -> id = $res['id'];
        $medicine -> medicineName = $res['medicineName'];
        $medicine -> price = $res['price'];
        return $medicine;
    }

    function getMedicineByBranch($branchID){
        $res = $this -> conn -> query(addslashes("SELECT * FROM BranchMedicine WHERE branchID={$branchID}"));
        return $res;
    }

    function store($medicine){
        $this -> conn -> query(addslashes("INSERT INTO Medicine VALUES(NULL, '{$medicine -> medicineName}', '{$medicine -> price}')"));
    }

    function addMedicineByBranch($medicineID, $branchID, $quantity){
//        echo $medicineID . ' ' . $branchID . ' ' . $quantity;
//        die();
        $this -> conn -> query(addslashes("INSERT INTO BranchMedicine VALUES({$medicineID}, {$branchID}, {$quantity})"));
    }

    function update($medicine, $id){
        $this -> conn -> query(addslashes("UPDATE Medicine SET medicineName='{$medicine -> medicineName}', price='{$medicine -> price}' WHERE id={$id}"));
    }

    function delete($id){
        $this -> conn -> query(addslashes("DELETE FROM Medicine WHERE id={$id}"));
    }
}