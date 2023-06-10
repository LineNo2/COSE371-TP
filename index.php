<?php 
$title = "메인페이지";
include 'db.php';
?>
<body>
    <h1>아니 php야 좀 실행을 해봐</h1>
    <?php
    include 'header.php'; 
    $sql = "SELECT * FROM `employee`";
    echo '왜 안나와요?';
    echo $sql;
    $result = mysqli_query($conn, $sql);
    echo $result->num_rows;
    ?>  
</body>
</html>