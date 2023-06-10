<?php
include 'db.php';
$emp_no = $_POST['emp_no'];
$work_date = $_POST['work_date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$sql = "INSERT INTO `work_record` (`emp_no`, `work_begin`, `work_end`) VALUES ('$emp_no', '$work_date $start_time', '$work_date $end_time')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('근무 추가 완료');history.back();</script>";
}else{
    echo "<script>alert('".$work_date."".$start_time."');history.back();</script>";
    echo $work_date;
    echo $start_time;
    echo $end_time;
}
?>