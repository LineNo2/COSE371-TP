<?php 
$title = "KU타벅스";
include 'header.php'; 
?>
    <h1>고객 목록</h1>
    <p>고객 목록을 확인하세요.</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">고객 전화번호</th>
      <th scope="col">포인트</th>
      <th scope="col">삭제</th>
    </tr>
  </thead>
  <tbody>
  <?
    include 'db.php';
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<th scope="row">'.$row['cust_tel'].'</th>';
        echo '<td>'.$row['point'].'</td>';
        echo '<td><input type="button" value="삭제" class="btn btn-danger" onclick="location.href=`customer_delete.php?cust_tel='.$row['cust_tel'].'`"></td>';
        echo '</tr>';
    }
    ?>  
  </tbody>
</table>
<?php 
include 'footer.php'; 
?>