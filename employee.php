<?php 
$title = "메인페이지";
include 'header.php'; 
?>
    <h1>직원 목록</h1>
    <p>직원 목록을 확인하세요.</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">이름</th>
      <th scope="col">생년월일</th>
      <th scope="col">휴대폰번호</th>
      <th scope="col">성별</th>
      <th scope="col">휴대폰번호</th>
      <th scope="col">삭제</th>
    </tr>
  </thead>
  <tbody>
  <?
    include 'db.php';
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<th scope="row">'.$row['emp_no'].'</th>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['date_of_birth'].'</td>';
        echo '<td>'.$row['gender'].'</td>';
        echo '<td>'.$row['emp_tel'].'</td>';
        echo '<td><input type="button" value="삭제" onclick="location.href=`employee_delete.php?emp_no`='.$row[`emp_no`].'"></td>';
        echo '</tr>';
    }
    ?>  
  </tbody>
</table>
<hr>
<h2>직원 추가</h2>
<input type="button" value="직원 추가" onclick="location.href='employee_add.php'">
<?php 
include 'footer.php'; 
?>