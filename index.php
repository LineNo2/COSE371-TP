<?php 
$title = "메인페이지";
include 'header.php'; 
?>
<body>
    <h1>아니 php야 좀 실행을 해봐</h1>
    <?php
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn, $sql);
    echo $result;
    echo '왜 안나와요?';
    echo $result->num_rows;
    ?>  
</body>
</html>