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
        echo '<td><input type="button" value="삭제" onclick="location.href=`employee_delete.php?emp_no='.$row['emp_no'].'`"></td>';
        echo '</tr>';
    }
    ?>  
  </tbody>
</table>
<hr>
<h2>직원 추가</h2>
<!-- make form with POST method to employee_add.php, and requirements is same to above table-->
<form name="empolyee_add" action="./employee_add.php" method="post">
  <div class="mb-3">
    <label for="name" class="form-label">이름</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="이름">
  </div>
  <div class="mb-3">
    <label for="date_of_birth" class="form-label">생년월일</label>
    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="생년월일">
  </div>
  <div class="mb-3">
    <label for="gender" class="form-label">성별</label>
    <input type="text" class="form-control" id="gender" name="date_of_birth" placeholder="성별">
  </div>
  <div class="mb-3">
    <label for="emp_tel" class="form-label">휴대폰번호</label>
    <input type="tel" class="form-control" id="emp_tel" name="emp_tel" placeholder="휴대폰번호">
  </div>
  <button type="submit" class="btn btn-primary">직원 추가</button>
</form>
<?php 
include 'footer.php'; 
?>