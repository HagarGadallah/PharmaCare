<?php
include "../src/PrescriptionManagement.php";

$pres = new Prescription();
$pres -> userIDDr = $_POST['userIDDr'];
$pres -> userIDNormal = $_POST['id'];

$psc = new PrescriptionManagement();
$id = $psc -> store($pres);

header("Location: ../addPrescriptionMedicine.php?id={$id}");
?>