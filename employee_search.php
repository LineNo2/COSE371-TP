<?php 
$title = "KU타벅스";
include 'header.php'; 
?>
    <h1>직원 검색</h1>
    <p>근무시간 관리할 직원을 검색하세요</p>
    <form action="employee_search_result.php" method="POST">
  <div class="mb-3">
    <label for="employee_info" class="form-label">직원 정보</label>
    <input type="text" class="form-control" id="employee_info" name="employee_info" placeholder="직원 이름, 전화번호">
  </div>
  <button type="submit" class="btn btn-primary">검색</button>
</form>
<?php 
include 'footer.php'; 
?>