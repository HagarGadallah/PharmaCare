<?php

include "../src/MedicineManagement.php";

$medicine = new Medicine();
$medicine -> medicineName = $_GET['name'];
$medicine -> price = $_GET['price'];

$mc = new MedicineManagement();
$mc -> store($medicine);

header('Location: ../medicines.php');