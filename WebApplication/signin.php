<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PharmaCare</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="signin.php">Sign In</a></li>
      <li><a href="signup.php">Sign Up</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-title">
      Sign In
    </div>
    <div class="panel-body">
      <form action="action/signincheck.php" method="post">
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" name="email" id="email" value="">
  </div>
  <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" name="password" id="password" value="">
    </div>
  <button type="submit" class="btn btn-default">Sign In</button>
</form>
    </div>
  </div>
</div>
  </body>
  <script src="js/bootstrap.min.js">

  </script>
</html>
