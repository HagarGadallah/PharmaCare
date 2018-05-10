<!DOCTYPE html>
<?php
session_start();
include "src/PrescriptionManagement.php";
include "src/MedicineManagement.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Prescriptions</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">PharmaCare</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="home.php">Home</a></li>
            <li><a href="home.php">Welcome, <?php echo $_SESSION['name'];?></a></li>
            <?php
            if($_SESSION['role'] == 'admin'){
                ?>
                <li ><a href="medicines.php">Medicines</a></li>
                <li><a href="branches.php">Branches</a></li>
                <li><a href="pharmacies.php">Pharmacies</a></li>
                <?php
            }else if($_SESSION['role'] == 'pharmacist'){
                ?>
                <li><a href="manageMedicines.php">Manage Branch</a></li>
            <?php
            }else if($_SESSION['role'] == 'dr'){
                ?>
                <li><a href="addPrescriptionMeta.php"> Add Prescription</a></li>
                <li class="active">
                    <form action="prescription.php" method="get" class="form-inline" role="form">

                        <div class="form-group">
                            <label class="sr-only" for="">Patient ID</label>
                            <input type="number" class="form-control" name="id" id="" placeholder="Input ...">
                        </div>



                        <button type="submit" class="btn btn-primary">Show Prescription</button>
                    </form>
                </li>
            <?php
            }
            ?>
            <li><a class="btn btn-primary" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-title">
            Prescription
        </div>
        <div class="panel-body">
            <h2>All the prescriptions</h2>
            <p>This contains all the medicines in all the table</p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Medicine Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mc = new PrescriptionManagement();
                $meds = $mc -> getPrescriptions($_GET['id']);
                while ($med = $meds -> fetch_assoc()) {
                    $medicines = $mc -> getMedicines($med['id']);
                    ?>
                <tr>
                    <td>
                        <ul>
                    <?php
                    while ($medicine = $medicines -> fetch_assoc()) {
                        $medc = new MedicineManagement();
                        $tmp = $medc -> show($medicine['medicineID']);
                        ?>


                        <li><?php echo $tmp -> medicineName ?></li>
                        <?php
                    }
                        ?>
                        </ul>
                    </td>

                </tr>
                        <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script src="js/bootstrap.min.js">

</script>
</html>
