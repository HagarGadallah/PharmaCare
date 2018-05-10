<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Pharmacy</title>
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
              <li class="active"><a href="pharmacies.php">Pharmacies</a></li>
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
      Add Pharmacy
    </div>
    <div class="panel-body">
      <form action="action/addPharmacy.php" method="post">
  <div class="form-group">
    <label for="name">Pharmacy Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <button type="submit" class="btn btn-default">Add</button>
</form>
    </div>
  </div>
</div>
  </body>
  <script src="js/bootstrap.min.js">

  </script>
</html>
