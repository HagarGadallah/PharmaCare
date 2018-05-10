<?php

include "../src/PharmacyManagement.php";

$pharmacy = new Pharmacy();

$pharmacy -> pharmacyName = $_POST['name'];

$pc = new PharmacyManagement();

$pc -> store($pharmacy);

header('Location: ../pharmacies.php');