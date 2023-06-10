<?php
include 'db.php';
$emp_no = $_POST['emp_no'];
$name = $_POST['name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$emp_tel = $_POST['emp_tel'];
$sql = "INSERT INTO `employee` (`emp_no`, `name`, `date_of_birth`, `gender`, `emp_tel`) VALUES ('$emp_no', '$name', '$date_of_birth', '$gender', '$emp_tel')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('직원 추가 완료');location.href='employee.php';</script>";
}else{
    echo "<script>alert('직원 추가 실패');history.back();</script>";
}
?>