<?php
include 'db.php';
$menu_name = $_POST['menu_name'];
$price = $_POST['price'];
$sql = "INSERT INTO menu_list (menu_name, price) VALUES ('$menu_name', $price)";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('메뉴 추가 완료');location.href='menu.php';</script>";
}else{
    echo "<script>alert('메뉴 추가 실패');history.back();</script>";
}
?>