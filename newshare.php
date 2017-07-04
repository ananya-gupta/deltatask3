<?php
include("config.php");
mysql_select_db($dbname)or die("cannot select DB");
session_start(); // Starting Session
if(!isset($_SESSION['sess_username'])){
header('Location:  login.php');};
$username=$_SESSION['sess_username'];
$email=$_SESSION['sess_email'];
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
mysql_close($conn); // Closing Connection
?>
