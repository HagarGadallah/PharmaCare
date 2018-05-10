<!DOCTYPE html>
<?php
session_start();
include "src/UserManagement.php";
include "src/BranchManagement.php";
include "src/PharmacyManagement.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Branches</title>
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
              <li class="active"><a href="branches.php">Branches</a></li>
              <li><a href="pharmacies.php">Pharmacies</a></li>
              <?php
          }else if($_SESSION['role'] == 'pharmacist'){
              ?>
              <li><a href="manageMedicines.php">Manage Branch</a></li>
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
       Branches
    </div>
    <div class="panel-body">
      <h2>All the Branches</h2>
      <p>This contains all the branches in all the table</p>            
      <a href="addBranch.php" class="btn btn-primary">Add Branch</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Branch Address</th>
            <th>Pharmacy</th>
            <th>Pharmacist</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $bc = new BranchManagement();
        $branches = $bc -> index();
        foreach ($branches as $branch) {
            $uc = new UserManagement();
            $user = $uc->show($branch->userID);
            $pc = new PharmacyManagement();
            $pharmacy = $pc->show($branch -> pharmacyID);
            ?>
            <tr>
                <td><?php echo $branch -> branchAddress?></td>
                <td><?php echo $pharmacy -> pharmacyName?></td>
                <td><?php echo $user -> name ?></td>
                <td><a href="editBranch.php" class="btn btn-primary">Edit</a></td>
                <td><a href="action/deleteBranch.php?id=<?php echo $branch -> id ?>" class="btn btn-danger">Delete</a></td>
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
