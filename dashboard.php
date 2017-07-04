<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard
    </title>
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
    <?php
include("config.php");
session_start();
if(!isset($_SESSION['sess_username'])){
header('Location:  login.php');};
mysql_select_db($dbname)or die("cannot select DB");
$url=$_SESSION['sess_url'];
$page_url=$_GET["id"];
$errcode;
$code;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["code"])) {
$errcode = "code is required";
} else {
$code = $_POST["code"];
}}
$sql1="SELECT `codes` FROM `delta`.`code_file` WHERE url_id='$page_url'";
$result1=mysql_query($sql1);
$row = mysql_fetch_assoc($result1);
?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Share
          </a>
        </div>
        <ul class="nav navbar-nav"  style ="float : right" >
          <li>
            <a href="newshare.php">New share
            </a>
          </li>
          <li >
            <a href="logout.php">Logout
            </a>
          </li>
        </ul> 
      </div>
    </nav>
    <form class="form-horizontal" action='dashboard.php?id=<?php echo $url?>' method="post">
      <div class="form-group">
        <div >          
          <center>
            <textarea type="text"  id="code"  name="code" >
              <?php echo $row["codes"]?>
            </textarea>
          </center>
        </div>
      </div>
      <div >        
        <div >
          <center>
            <button type="submit" class="btn btn-success">SAVE
            </button>  
          </center>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</section>
</body>
</html>
<?php
if(isset($code)){
$sql="UPDATE `delta`.`code_file` SET codes='$code' WHERE url_id='$url'";
$result=mysql_query($sql);
echo "<div class='alert alert-success'>
<strong>Success!</strong> Code Stored Successfully.
</div>" ;  }    
else {
echo mysql_error();
}
// close connection 
mysql_close();
?>