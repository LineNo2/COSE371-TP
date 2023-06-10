<?php
include 'db.php';
$menu_name = $_GET['menu_name'];
$sql = "DELETE FROM menu_list WHERE menu_name = $menu_name";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('메뉴 삭제 완료');location.href='menu.php';</script>";
}else{
    echo "<script>alert('메뉴 삭제 실패');history.back();</script>";
}
?>
