<?php

include "../src/PharmacyManagement.php";

$pharmacy = new Pharmacy();

$pharmacy -> pharmacyName = $_POST['name'];

$pc = new PharmacyManagement();

$pc -> update($pharmacy, $_POST['id']);

header('Location: ../pharmacies.php');