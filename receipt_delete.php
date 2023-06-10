<?php
include 'db.php';
$receipt_no = $_GET['receipt_no'];
$sql = "DELETE FROM receipt WHERE receipt_no = $receipt_no";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('주문 내역 삭제 완료');location.href='receipt.php';</script>";
}else{
    echo "<script>alert('주문 내역 삭제 실패');history.back();</script>";
}
?>
