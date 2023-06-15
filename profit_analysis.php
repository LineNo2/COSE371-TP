<?php 
$title = "KU타벅스";
include 'header.php'; 
?>
<h2>매출 분석</h2>
<h3>담당 직원별 매출 분석</h3>
<p>주문을 담당한 직원을 확인하세요</p>
<form>
  <div class="mb-3">
    <label for="employee_info" class="form-label">직원 정보</label>
    <input type="text" class="form-control" id="employee" name="employee" placeholder="직원 이름, 전화번호, 직원 번호.. " required>
    <input type="button" class="btn btn-success" onclick="ajax_search_emp()" value="직원 검색">
  </div>
</form>
<h3>고객별 매출 분석</h3>
<p>주문한 고객별 매출을 확인하세요</p>
  <div class="mb-3">
    <label for="employee_info" class="form-label">고객 전화번호</label>
    <input type="text" class="form-control" id="cust_tel" name="cust_tel" placeholder="고객 전화번호 ">
    <input type="button" class="btn btn-success" onclick="ajax_search_customer()" value="고객 검색">
  </div>
<h3>시간대 매출 분석</h3>
<p>특정 시간대 사이에 발생한 매출을 확인하세요</p>
<form action="./profit_analysis_result.php" method="get">
<div class="mb-3">
    <label for="work_date" class="form-label">일시</label>
    <input type="date" class="form-control" id="work_date" name="work_date" required>
  </div>
<div class="mb-3">
    <label for="start_time" class="form-label">시작 시간</label>
    <input type="time" class="form-control" id="start_time" name="start_time" required>
  </div>
  <div class="mb-3">
    <label for="end_time" class="form-label">종료 시간</label>
    <input type="time" class="form-control" id="end_time" name="end_time" required>
  </div>
  <button type="submit" class="btn btn-primary">시간대로 조회</button>
</form>

<script>
  employee = [];
  customer = [];
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
                location.href = "profit_analysis_result.php?emp_no=" + employee[0].emp_no;
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
function ajax_search_customer() {
    var search = document.getElementById("cust_tel").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // readyState == 4 : request finished and response is ready, status == 200 : "OK"
            eval(this.responseText);
            if(customer.length == 0) {
                alert("전화번호 전체를 정확히 입력해주세요.");
                return;
            }
            else if(customer.length == 1) {
                location.href = "profit_analysis_result.php?cust_tel=" + customer[0].cust_tel;
                return;
            }
            else{
                alert("전화번호를 정확히 입력해주세요.");
            }
        }
    };
    xhttp.open("GET", "customer_search_ajax.php?keyword=" + document.getElementById("cust_tel").value, true);
    xhttp.send();
}
</script>
<?php 
include 'footer.php'; 
?>