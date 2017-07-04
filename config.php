<?php
$servername = "localhost";
$username = "ananya";
$password = "1234";
$dbname = "delta";
// Create connection
$conn = mysql_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
?>