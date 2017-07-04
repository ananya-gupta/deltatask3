<?php
include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
session_start(); // Starting Session
$error=""; // Variable To Store Error Message
$email="";
$password="";
if(isset($_POST['email'])){
$email = test_input($_POST['email']);
}
if (isset($_POST['pwd'])) {
$password = test_inputpwd($_POST['pwd']);
}
// SQL query to fetch information of registerd users and finds user match.
$sql=("SELECT * from `delta`.`registration` WHERE password='$password' AND email='$email'");
if($queryrun=mysql_query($sql))
{
if(mysql_num_rows($queryrun)==NULL)
{
echo '<html><span>Invalid Email or Password</span></html>';
header('Location: registration.php');
}
else
{
while($row=mysql_fetch_assoc($queryrun))
{
$username=$row['name'];
$email=$row['email'];
}
session_regenerate_id();
$_SESSION['sess_username'] = $username;
$_SESSION['sess_email'] = $email;
function generateRandomString($length=5 ) {
$randomString = '';
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}
$url=generateRandomString();
$_SESSION['sess_url'] = $url;
$sql1="INSERT INTO `delta`.`code_file` (`name`, `email`,`url_id`) VALUES ('$username', '$email', '$url')";
$result1=mysql_query($sql1);
header('Location: dashboard.php?id='.$url);
}}
else
{
//echo 'not run';
echo mysql_error();
}
mysql_close($conn); // Closing Connection
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
function test_inputpwd($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
$data =  MD5($data);
return $data;
}
?>
