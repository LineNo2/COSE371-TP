<?php 
$title = "메인페이지";
include 'header.php'; 
?>
<body>
    <?php
    $sql = "SELECT * FROM `employee`";
    $result = $conn->query($sql);
    echo $result;
    ?>  
</body>
</html>