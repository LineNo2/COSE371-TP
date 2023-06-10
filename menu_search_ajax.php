<?php
include 'db.php';
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM menu_list WHERE menu_name LIKE '%$keyword%';";
$result = mysqli_query($conn, $sql);
echo 'menu_list = [';
while($row = mysqli_fetch_array($result)){
    echo '{';
    echo 'name: "'.$row['menu_name'].'",';
    echo '},';
}
echo '];';
?>