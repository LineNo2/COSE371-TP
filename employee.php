<?php 
$title = "메인페이지";
include 'header.php'; 
?>
    <?php
    include 'db.php';
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn, $sql);
    echo mysqli_fetch_array($result);
    ?>  
<?php 
include 'footer.php'; 
?>