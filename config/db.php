<?php
    $connect = mysqli_connect("localhost", "root", "", "fptphp1");
    if (!$connect) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    } else {
        mysqli_query($connect, "SET NAMES 'utf8'");
    }
?>