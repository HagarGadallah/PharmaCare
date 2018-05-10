<?php

include "../src/MedicineManagement.php";

$medicine = new Medicine();
$medicine -> medicineName = $_POST['name'];
$medicine -> price = $_POST['price'];

$mc = new MedicineManagement();
$mc -> update($medicine, $_POST['id']);

header('Location: ../medicines.php');