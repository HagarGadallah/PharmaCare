<?php
session_start();
include "../src/UserManagement.php";

$user = new User();
$user -> name = $_POST['name'];
$user -> email = $_POST['email'];
$user -> password = $_POST['password'];
$user -> userType = $_POST['role'];

$uc = new UserManagement();
$uc -> store($user);
$_SESSION['name'] = $user -> name;
$_SESSION['role'] = $user -> userType;
header('Location: ../home.php');