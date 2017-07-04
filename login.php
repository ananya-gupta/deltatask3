<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log in
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--Icon Fonts-->
    <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
  </head>
  <body>
    <div class="container">
      <center>
        <h2>
          <a href="registration.php" >REGISTER
          </a> / LOG IN
        </h2>
      </center>
      <form class="form-horizontal" action="loginc.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:
          </label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:
          </label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Log In
            </button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
