<?php
include 'db.php';
$emp_no = $_POST['emp_no'];
$work_date = $_POST['work_date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$sql = "INSERT INTO work_record (emp_no, work_begin, work_end) VALUES ($emp_no, '$work_date $start_time:00', '$work_date $end_time:00')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('근무 추가 완료.');location.href='employee_search.php';</script>";
}else{
    echo "<script>alert('근무 추가 실패');history.back();</script>";
}
?>