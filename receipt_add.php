<?php
include 'db.php';
$emp_no = $_POST['emp_no'];
$cust_tel = $_POST['cust_tel'];
if($cust_tel == ""){
    echo "<script>alert('고객 전화번호를 입력해주세요.');history.back();</script>";
}
// there is no menus total number in parameter, so we have to count to 5 until there is no menu_no.
mysqli_query($conn, "set autocommit = 0");
mysqli_query($conn, "set session transaction isolation level serializable");
mysqli_query($conn, "begin");
$sql = "INSERT INTO customer (cust_tel, point) VALUES ('$cust_tel', 0);";
$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('새로 등록되는 고객입니다.');history.back();</script>";
}
$sql = "INSERT INTO receipt (emp_no, cust_tel, order_time) VALUES ('$emp_no', '$cust_tel', now())";
$result = mysqli_query($conn, $sql);
//exception handler
if(!$result){
    echo "<script>alert('주문 추가 실패');history.back();</script>";
    mysqli_query($conn, “rollback”); 
}
$sql = "SELECT receipt_no FROM receipt ORDER BY receipt_no DESC LIMIT 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$receipt_no = $row['receipt_no'];
for($i=0;$i<10;$i++){
    if(isset($_POST['menu-'.$i])){
        $menu_name = $_POST['menu-'.$i];
        $menu_count = $_POST['menu-'.$i.'-count'];
        if($menu_name == "" || $menu_count == "")
            continue;
        $sql = "INSERT INTO made_menu (menu_name, count, receipt_no) VALUES ('$menu_name',$menu_count,$receipt_no)";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "<script>alert('Order 저장 실패');history.back();</script>";
            mysqli_query($conn, “rollback”); 

        }
    }
}

$sql = "SELECT * FROM receipt NATURAL JOIN made_menu NATURAL JOIN menu_list WHERE receipt_no = '$receipt_no'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "<script>alert('포인트 계산 실패');history.back();</script>";
    mysqli_query($conn, “rollback”); 
}
$point = 0;
while($row = mysqli_fetch_array($result)){
    $point += $row['price'] * $row['count'] * 0.03;
}
$sql = "UPDATE customer SET point = point + '$point' WHERE cust_tel = '$cust_tel'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "<script>alert('포인트 적립 실패');history.back();</script>";
    mysqli_query($conn, “rollback”); 
}
echo "<script>alert('포인트 적립 완료! +$point !');location.href='receipt.php';</script>";
mysqli_query($conn, "commit");
mysqli_close($conn);
?>
