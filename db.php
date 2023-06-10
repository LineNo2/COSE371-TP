<?php
$servername = "localhost";
$username = "db2019320020";
$password = "hosun1804@gmail.com";
$dbname = "db2019320020";
// Create connection
$conn = dbconnect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}
?>
