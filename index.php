<?php 
$title = "메인페이지";
include 'header.php'; 
?>
<body>
    <?php
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn, $sql);
    echo $result;
    ?>  
</body>
</html>