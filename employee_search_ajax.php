<?php
include 'db.php';
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM employee WHERE name LIKE '%$keyword%' OR emp_tel LIKE '%$keyword%' OR emp_no = '$keyword;'";
$result = mysqli_query($conn, $sql);
echo 'employee = [';
while($row = mysqli_fetch_array($result)){
    echo '{';
    echo 'emp_no: '.$row['emp_no'].',';
    echo 'name: "'.$row['name'].'",';
    echo 'date_of_birth: "'.$row['date_of_birth'].'",';
    echo 'gender: "'.$row['gender'].'",';
    echo 'emp_tel: "'.$row['emp_tel'].'",';
    echo '},';
}
echo '];';
?>