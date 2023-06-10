<?php
include 'db.php';
$cust_tel = $_GET['cust_tel'];
$sql = "DELETE FROM customer WHERE cust_tel = '$cust_tel'";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('고객 삭제 완료');location.href='customer.php';</script>";
}else{
    echo "<script>alert('고객 삭제 실패');history.back();</script>";
}
?>
