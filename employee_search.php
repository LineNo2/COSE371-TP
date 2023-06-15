<?php 
$title = "KU타벅스";
include 'header.php'; 
?>
    <h1>직원 검색</h1>
    <p>근무시간 관리할 직원을 검색하세요</p>
    <form action="employee_search_result.php" method="POST">
  <div class="mb-3">
    <label for="employee_info" class="form-label">직원 정보</label>
    <input type="text" class="form-control" id="employee" name="employee" placeholder="직원 이름, 전화번호, 직원 번호.. " required>
    <input type="button" class="btn btn-success" onclick="ajax_search_emp()" value="직원 검색">
  </div>
</form>

<script>
  employee = [];
  function ajax_search_emp() {
    var search = document.getElementById("employee").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // readyState == 4 : request finished and response is ready, status == 200 : "OK"
            eval(this.responseText);
            if(employee.length == 0) {
                alert("검색 결과가 없습니다.");
                return;
            }
            else if(employee.length == 1) {
                document.getElementById("employee").value = `${employee[0].name}`;
                document.getElementById("employee").disabled = true;
                location.href = "employee_search_result.php?emp_no=" + employee[0].emp_no;
                return;
            }
            else{
                alert("검색 결과가 여러개 입니다. 조금 더 구체적으로 입력해 주세요.");
            }
        }
    };
    xhttp.open("GET", "employee_search_ajax.php?keyword=" + document.getElementById("employee").value, true);
    xhttp.send();
}
</script>
<?php 
include 'footer.php'; 
?>