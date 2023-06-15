<?php 
$title = "KU타벅스";
include 'header.php'; 
?>
<h2>주문 내역</h2>
    <p>주문 내역입니다.</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">고객</th>
      <th scope="col">담당 직원</th>
      <th scope="col">주문일시</th>
      <th scope="col">결제 총액</th>
      <th scope="col">삭제</th>
    </tr>
  </thead>
  <tbody>
  <?
    include 'db.php';
    $sql = "SELECT receipt_no, name, emp_no, order_time, cust_tel, SUM(menu_tot) as tot FROM receipt  NATURAL JOIN customer  NATURAL JOIN employee NATURAL JOIN ( SELECT price * count as menu_tot, receipt_no FROM menu_list NATURAL JOIN made_menu) as tb1 GROUP BY receipt_no";
    if($_GET['emp_no']){
        $sql = $sql." HAVING emp_no = ".$_GET['emp_no'];
    }
    else if($_GET['cust_tel']){
        $sql = $sql." HAVING cust_tel = '".$_GET['cust_tel']."'";
    }
    else if($_GET['start_time'] && $_GET['end_time']){
        // $sql = $sql." HAVING order_time BETWEEN '".$_GET['start_time']."' AND '".$_GET['end_time']."'";
        $sql = $sql." HAVING order_time BETWEEN '".$_GET['work_date']." ".$_GET['start_time'].":00' AND '".$_GET['work_date']." ".$_GET['end_time'].":00'";
    }
    $result = mysqli_query($conn, $sql);
    $totals = 0;
    while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<th scope="row">'.$row['receipt_no'].'</th>';
        echo '<td>'.$row['cust_tel'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['order_time'].'</td>';
        echo '<td>'.$row['tot'].'</td>';
        echo '<td><input type="button" value="삭제" class="btn btn-danger" onclick="location.href=`receipt_delete.php?receipt_no='.$row['receipt_no'].'`"></td>';
        echo '</tr>';
        $totals += $row['tot'];
    }
    // total profit
    echo '<tr>';
    echo '<th scope="row">총 수익</th>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td>'.$totals.'</td>';
    echo '<td></td>';
    echo '</tr>';
    ?>  
  </tbody>
</table>
<?php 
include 'footer.php'; 
?>