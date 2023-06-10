//import header
<?php 
//set title
$title = "메인페이지";
include 'header.php'; 
?>
<body>
    <?php
    $sql = "SELECT * FROM `employee`";
    $result = $conn->query($sql);
    ?>  
</body>
</html>