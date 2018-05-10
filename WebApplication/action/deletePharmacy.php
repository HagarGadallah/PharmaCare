<?php

include "../src/PharmacyManagement.php";

$pc = new PharmacyManagement();

$pc ->delete($_GET['id']);

header('Location: ../pharmacies.php');