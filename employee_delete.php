<?php
include 'db.php';
$emp_no = $_GET['emp_no'];
$sql = "DELETE FROM `employee` WHERE emp_no = $emp_no";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('직원 삭제 완료');location.href='employee.php';</script>";
}else{
    echo "<script>alert('직원 삭제 실패 + $result);history.back();</script>";
}
?>
