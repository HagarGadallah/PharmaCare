<?php

include "../src/BranchManagement.php";

$branch = new Branch();
$branch -> branchAddress = $_POST['branchAddress'];
$branch -> pharmacyID = $_POST['pharmacyID'];
$branch -> userID = $_POST['userID'];

$bc = new BranchManagement();
$bc -> store($branch);

header('Location: ../branches.php');