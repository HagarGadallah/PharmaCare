<?php
include "../src/MedicineManagement.php";

$mc = new MedicineManagement();
$mc-> delete($_GET['id']);

header('Location: ../medicines.php');