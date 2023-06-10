<?php
include 'db.php';
$emp_no = $_GET['emp_no'];
$work_begin = $_GET['work_begin'];
$work_end = $_GET['work_end'];
$sql = "DELETE FROM work_record WHERE emp_no = $emp_no and work_begin = '$work_begin' and work_end = '$work_end'";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('근무 삭제 완료. 화면을 새로고침 해주세요.');location.href='menu.php';</script>";
}else{
    echo "<script>alert('근무 삭제 실패');history.back();</script>";
}
?>