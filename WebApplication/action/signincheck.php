<?php
session_start();
include "../src/UserManagement.php";

$user = new User();
$user -> email = $_POST['email'];
$user -> password = $_POST['password'];

$uc = new UserManagement();
$res = $uc -> login($user);
if($res != NULL){
    $_SESSION['name'] = $res['name'];
    $_SESSION['userID'] = $res['id'];
    $_SESSION['role'] = $res['userType'];
    header('Location: ../home.php');
}else{
    header('Location: ../signin.php');
}