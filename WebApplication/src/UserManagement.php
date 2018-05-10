<?php

include_once "Connection.php";
include "User.php";

class UserManagement{
    private $conn;

    function __construct()
    {
        $obj = new Connection();
        $this -> conn = $obj -> getConnection();
    }

    function store($user){
        $this -> conn ->query("INSERT INTO User VALUES (NULL, '{$user -> name}', '{$user -> email}',
        '{$user -> password}', '{$user -> userType}')");
        if($this -> conn -> error == null){
            $error = 'Success';
        }else{
            $error = $this -> conn -> error;
        }
        echo $error;
    }

    function login($user){
        $res = $this -> conn -> query("SELECT * FROM User WHERE email='{$user -> email}' AND password='{$user -> password}'");
        return $res -> fetch_assoc();
    }

    function filterByRole($role){
        $res = $this -> conn -> query("SELECT * FROM User WHERE userType='{$role}'");
        $users = array();
        $i = 0;
        while($user = $res -> fetch_assoc()){
            $users[$i] = new User();
            $users[$i] -> id = $user['id'];
            $users[$i] -> name = $user['name'];
            $i++;
        }
        return $users;
    }

    function show($id){
        $res = $this -> conn -> query("SELECT * FROM User WHERE id={$id}");
        $med = $res -> fetch_assoc();
        $user = new User();
        $user -> name = $med['name'];
        return $user;
    }

}