<?php
include 'db.php';
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM customer where cust_tel = '$keyword'";
$result = mysqli_query($conn, $sql);
echo 'customer = [';
while($row = mysqli_fetch_array($result)){
    echo '{';
    echo 'cust_tel: "'.$row['cust_tel'].'",';
    echo '},';
}
echo '];';
?>