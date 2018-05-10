<?php

include "../src/BranchManagement.php";

$bc = new BranchManagement();
$bc -> delete($_GET['id']);

header('Location: ../branches.php');