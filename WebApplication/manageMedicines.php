<!DOCTYPE html>
<?php
session_start();
//include "src/UserManagement.php";
include "src/BranchManagement.php";
//include "src/PharmacyManagement.php";
include "src/MedicineManagement.php"
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Manage Branch</title>
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
                <li  ><a href="medicines.php">Medicines</a></li>
                <li><a href="branches.php">Branches</a></li>
                <li><a href="pharmacies.php">Pharmacies</a></li>
                <?php
            }else if($_SESSION['role'] == 'pharmacist'){
                ?>
                <li class="active"><a href="manageMedicines.php">Manage Branch</a></li>
                <?php
            }else if($_SESSION['role'] == 'dr'){
                ?>
                <li><a href="addPrescriptionMeta.php"> Add Prescription</a></li>
                <li>
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
            Manage Branch
        </div>
        <div class="panel-body">
            <h2>All the Medicines in the branch</h2>
            <p>This contains all the branches in all the table</p>
            <form class="form-inline" action="action/addMedicineBranch.php" method="post">
                <div class="form-group">
                    <?php

                    ?>
                    <label for="email">Medicine</label>
                    <select name="medicineID" id="">
                        <?php
                            $bc = new BranchManagement();
                            $branch = $bc -> getBranchByUser($_SESSION['userID']);
                            $mc = new MedicineManagement();
                            $medicines = $mc -> index();
                            foreach ($medicines as $medicine) {
                                ?>
                                <option value="<?php echo $medicine -> id?>"><?php echo $medicine -> medicineName ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="branchID" value="<?php echo $branch -> id ?>">
                <div class="form-group">
                    <label for="pwd">Quantity:</label>
                    <input type="number" name="quantity" class="form-control" id="pwd">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Medicine</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mc = new MedicineManagement();
                $meds = $mc -> getMedicineByBranch($branch -> id);
                foreach ($meds as $med) {
                    ?>
                    <tr>
                        <td><?php echo $mc -> show($med['medicineID']) -> medicineName ?></td>
                        <td><?php echo $med['quantity'] ?></td>
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
