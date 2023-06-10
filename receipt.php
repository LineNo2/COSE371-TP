<?php 
$title = "메인페이지";
include 'header.php'; 
?>
<h2>주문 추가</h2>
<!-- make form with POST method to employee_add.php, and requirements is same to above table-->
<form name="empolyee_add" action="./receipt_add.php" method="post">
  <div class="mb-3">
    <label for="employee" class="form-label">담당 직원</label>
    <input type="text" class="form-control" id="employee" name="employee" placeholder="담당 직원 검색" required>
    <input type="hidden" class="form-control" id="emp_no" name="emp_no" value="">
    <input type="button" class="btn btn-secondary" onclick="ajax_search_emp()" value="직원 추가">
  </div>
  <div class="mb-3">
    <label for="cust_tel" class="form-label">고객 전화번호</label>
    <input type="text" class="form-control" id="cust_tel" onblur="len(this.value)"  name="cust_tel" placeholder="전화번호 입력">
  </div>
  <div class="mb-3">
    <label for="cust_tel" class="form-label">메뉴 추가</label>
    <input type="button" value="+" onclick="add_menu()">
  </div>
  <div class="mb-3" id="menu-list">

  </div>
  <button type="submit" class="btn btn-primary">직원 추가</button>
</form>
<hr>
<h2>주문 내역</h2>
    <p>주문 내역입니다.</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">주문일시</th>
      <th scope="col">담당 직원</th>
      <th scope="col">고객</th>
      <th scope="col">고객 포인트</th>
      <th scope="col">삭제</th>
    </tr>
  </thead>
  <tbody>
  <?
    include 'db.php';
    $sql = "SELECT * FROM receipt NATURAL JOIN employee NATURAL JOIN customer ";
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

<script>
    let employee = [];
    let cur_menu = 0;
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
                document.getElementById("emp_no").value = `${employee[0].emp_no}`;
                document.getElementById("employee").value = `${employee[0].name}`;
                document.getElementById("employee").disabled = true;
                alert("직원을 추가했습니다.");
                return;
            }
            else{
                alert("좀 더 정확하게 입력해주세요.");
            }
        }
    };
    xhttp.open("GET", "employee_search_ajax.php?keyword=" + document.getElementById("employee").value, true);
    xhttp.send();
}
function add_menu() {
    if(cur_menu > 5){
        alert('메뉴는 5개까지만 추가할 수 있습니다.');
        return;
    }
    let menu_list = document.getElementById("menu-list");
    let menu = document.createElement("div");
    menu.setAttribute("class", "mb-3");
    menu.setAttribute("id", `menu-${cur_menu}`);
    menu.innerHTML = `
    <input type="text" class="form-control" id="menu-${cur_menu}" name="menu-${cur_menu}" placeholder="메뉴 이름" required>
    <input type="number" max="10" min="1" class="form-control" id="menu-${cur_menu}-count" name="menu-${cur_menu}-count" placeholder="수량 입력" required>
    <input type="button" class="btn btn-secondary" onclick="ajax_search_menu(${cur_menu})" value="메뉴 추가">
    <input type="button" value="메뉴 삭제" class="btn btn-danger" onclick="document.querySelector('menu-${cur_menu}').remove()">
    `;
    menu_list.appendChild(menu);
    cur_menu++;
}
function ajax_search_menu(cur_menu) {
    var search = document.getElementById(`menu-${cur_menu}`).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // readyState == 4 : request finished and response is ready, status == 200 : "OK"
            eval(this.responseText);
            if(menu_list.length == 0) {
                alert("검색 결과가 없습니다.");
                return;
            }
            else if(menu_list.length == 1) {
                document.getElementById(`menu-${cur_menu}`).value = `${menu_list[0].menu_no}`;
                document.getElementById(`menu-${cur_menu}`).disabled = true;
                document.getElementById(`menu-${cur_menu}-count`).value = 1;
                alert("메뉴를 추가했습니다.");
                return;
            }
            else{
                alert("좀 더 정확하게 입력해주세요.");
            }
        }
    };
    xhttp.open("GET", "menu_search_ajax.php?keyword=" + document.getElementById(`menu-${cur_menu}`).value, true);
    xhttp.send();
}
    function len(gth) {
    if (gth.substring(3, 4) == '-' && gth.substring(7, 8) == '-') // 123-456-7890
        gth = gth.replace('-', '').replace('-', '');
    else if (gth.substring(0, 1) == '(' && gth.substring(4, 5) == ')' && gth.substring(8, 9) == '-') // (123)456-7890
        gth = gth.replace('(', '').replace(')', '').replace('-', '');
    else if (gth.substring(0, 1) == '(' && gth.substring(4, 5) == ')') // (123)4567890
        gth = gth.replace('(', '').replace(')', '');        
    
    if (!isNaN(gth) && gth.length == 10) {
        return true;
    }
    alert("전화번호의 길이는 12자리입니다.");
}
</script>
<?php 
include 'footer.php'; 
?>