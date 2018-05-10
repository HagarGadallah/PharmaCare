<?php
include_once "Connection.php";
include "Branch.php";

class BranchManagement{
    private $conn;

    function __construct()
    {
        $obj = new Connection();
        $this -> conn = $obj -> getConnection();
    }

    function index(){
        $res = $this -> conn -> query(addslashes("SELECT * FROM Branch"));
        $Branchs = array();
        $i = 0;
        while($med = $res -> fetch_assoc()){
            $Branchs[$i] = new Branch();
            $Branchs[$i] -> id = $med['id'];
            $Branchs[$i] -> branchAddress = $med['branchAddress'];
            $Branchs[$i] -> pharmacyID = $med['pharmacyID'];
            $Branchs[$i] -> userID = $med['userID'];
            $i++;

        }
        return $Branchs;
    }

    function show($id){
        $Branch = new Branch();
        $med = $this -> conn -> query(addslashes("SELECT * FROM Branch WHERE id={$id}"));
        $res = $med -> fetch_assoc();
        $Branch -> id = $res['id'];
        $Branch -> branchAddress = $res['branchAddress'];
        $Branch -> pharmacyID = $res['pharmacyID'];
        $Branch -> userID = $res['userID'];
        return $Branch;
    }

    function getBranchByUser($userID){
        $Branch = new Branch();
        $med = $this -> conn -> query(addslashes("SELECT * FROM Branch WHERE userID={$userID}"));
        $res = $med -> fetch_assoc();
        $Branch -> id = $res['id'];
        $Branch -> branchAddress = $res['branchAddress'];
        $Branch -> pharmacyID = $res['pharmacyID'];
        $Branch -> userID = $res['userID'];
        return $Branch;
    }

    function store($Branch){
        $this -> conn -> query(addslashes("INSERT INTO Branch VALUES(NULL, '{$Branch -> branchAddress}', '{$Branch -> pharmacyID}', '{$Branch -> userID}')"));
//        echo $this -> conn -> error;
//        die();
    }

    function update($Branch, $id){
        $this -> conn -> query(addslashes("UPDATE Branch SET branchAddress='{$Branch -> branchAddress}', pharmacyID='{$Branch -> pharmacyID}', userID='{$Branch -> userID}' WHERE id={$id}"));
    }

    function delete($id){
        $this -> conn -> query(addslashes("DELETE FROM Branch WHERE id={$id}"));
    }
}