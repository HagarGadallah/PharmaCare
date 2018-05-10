<?php

include "../src/PrescriptionManagement.php";

$pc = new PrescriptionManagement();

$pc -> addMedicine($_POST['presID'], $_POST['medicineID']);

if(isset($_POST['another'])){
    header("Location: ../addPrescriptionMedicine.php?id={$_POST['presID']}");
}if(isset($_POST['finish'])) {
    header("Location: ../home.php");
}