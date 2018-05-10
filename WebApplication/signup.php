<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function validate(){
            var email = document.getElementById('email').value;
            if(email.indexOf('@') > email.indexOf('.') || email.indexOf('@') == -1 || email.indexOf('.') == -1 || email.indexOf('@') < 0 || email.indexOf('.') - email.indexOf('@') <= 1){
                alert('Please enter a valid email' + email.indexOf('.') + " " + email.indexOf('@'));
                return false;
            }else if(document.getElementById('pwd').value.length < 8){
              alert('Please enter a password with more than 8 characters');
              return false;
            }else if(document.getElementById('pwd').value != document.getElementById('conpassword').value){
              alert("Passwords values don't match");
              return false;
            }else if(document.getElementById('name').value == ""){
              alert('Please enter your name');
              return false;
            }
            alert('You Registered Successfully !!!');
            return true;
        }
    </script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PharmaCare</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="signin.php">Sign In</a></li>
      <li class="active"><a href="signup.php">Sign Up</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-title">
      Sign Up
    </div>
    <div class="panel-body">
      <form action="action/signupcheck.php" onsubmit="return validate()" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="">
          </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" name="email" id="email" value="">
  </div>
  <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" name="password" id="pwd" value="">
    </div>
    <div class="form-group">
        <label for="pwd">Confirm Password</label>
        <input type="password" class="form-control" id="conpassword" value="">
      </div>
      <div class="form-group">
          <label for="role">User Role</label>
            <select name="role" id="role">
              <option value="normal">Normal User</option>
              <option value="">Hospital Employee</option>
              <option value="dr">Doctor</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="admin">Admin</option>
            </select>
          
      </div>
  <button type="submit" class="btn btn-default">Sign Up</button>
</form>
    </div>
  </div>
</div>
  </body>
  <script src="js/bootstrap.min.js">

  </script>
</html>
