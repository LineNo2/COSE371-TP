<?php
include 'db.php';
$emp_no = $_GET['emp_no'];
$work_begin = $_GET['work_begin'];
$work_end = $_GET['work_end'];
$sql = "DELETE FROM work_record WHERE emp_no = $emp_no and work_begin = '$work_begin' and work_end = '$work_end'";
echo $sql;
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('근무 삭제 완료');history.back();</script>";
}else{
    echo "<script>alert('$sql');history.back();</script>";
}
?>