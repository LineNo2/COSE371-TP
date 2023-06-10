<?php 
$title = "메인페이지";
include 'header.php'; 
?>
    <h1>직원 조회</h1>
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
    $employee_info = $_POST['employee_info'];
    $sql = "SELECT * FROM `employee` WHERE `name` LIKE '%$employee_info%' OR `emp_tel` LIKE '%$employee_info%'";
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">시작 일시</th>
      <th scope="col">종료 일시</th>
      <th scope="col">삭제</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "SELECT * FROM work_record WHERE emp_no = '$emp_no";
$result = mysqli_query($conn, $sql);
$cnt = 0;
while($row = mysqli_fetch_array($result)){
    echo '<tr>'.$cnt.'</tr>';
    echo '<td>'.$row['work_begin'].'</td>';
    echo '<td>'.$row['work_end'].'</td>';
    echo '<td><input type="button" value="삭제" onclick="location.href=`work_manage_delete.php?emp_no='.$row['emp_no'].'work_begin='.$row['work_begin'].'work_end='.$row['work_end'].'`"></td>';
    echo '</tr>';
    $cnt++;
}
?>
  </tbody>
</table>
<h2>근무시간 추가</h2>
<form name="empolyee_add" action="./work_manage_add.php" method="post">
<input type="hidden" class="form-control" id="emp_no" name="emp_no" value="<?$emp_no?>">
  <div class="mb-3">
    <label for="work_date" class="form-label">일시</label>
    <input type="date" class="form-control" id="work_start_date" name="work_start_date">
  </div>
  <div class="mb-3">
    <label for="start_time" class="form-label">시작 시간</label>
    <input type="time" class="form-control" id="start_time" name="start_time">
  </div>
  <div class="mb-3">
    <label for="end_time" class="form-label">종료 시간</label>
    <input type="time" class="form-control" id="end_time" name="end_time">
  </div>
  <button type="submit" class="btn btn-primary">근무 시간 추가</button>
</form>
<?php 
include 'footer.php'; 
?>