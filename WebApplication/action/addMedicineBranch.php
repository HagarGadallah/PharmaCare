<?php

include "../src/MedicineManagement.php";

$mc = new MedicineManagement();
$mc -> addMedicineByBranch($_POST['medicineID'], $_POST['branchID'], $_POST['quantity']);

header('Location: ../manageMedicines.php');