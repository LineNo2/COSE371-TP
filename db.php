//connect to db
<?php
$servername = "localhost";
$username = "2019320020";
$password = "hosun1804@gmail.com";
$dbname = "db2019320020";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}
?>
