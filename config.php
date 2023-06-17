<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "19n30008";
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
?>