<?php 
$title = "메인페이지";
include 'header.php'; 
?>
    <h1>메뉴 목록</h1>
    <p>메뉴 목록을 확인하세요.</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">메뉴 이름</th>
      <th scope="col">가격</th>
      <th scope="col">삭제</th>
    </tr>
  </thead>
  <tbody>
  <?
    include 'db.php';
    $sql = "SELECT * FROM menu_list";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<th scope="row">'.$row['menu_name'].'</th>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td><input type="button" value="삭제" onclick="location.href=`menu_delete.php?menu_name='.$row['menu_name'].'`"></td>';
        echo '</tr>';
    }
    ?>  
  </tbody>
</table>
<hr>
<h2>메뉴 추가</h2>
<!-- make form with POST method to employee_add.php, and requirements is same to above table-->
<form name="menu_add" action="./menu_add.php" method="post">
  <div class="mb-3">
    <label for="menu_name" class="form-label">메뉴 이름</label>
    <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="이름" required>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">가격</label>
    <input type="int" class="form-control" id="price" name="price" placeholder="생년월일">
  </div>
  <button type="submit" class="btn btn-primary">직원 추가</button>
</form>
<?php 
include 'footer.php'; 
?>