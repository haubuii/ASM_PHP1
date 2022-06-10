<?php 
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM category WHERE category_id = $id";
    $query = mysqli_query($connect, $sql_delete);
    header('location: index.php?page_layout=danhsach');
?>