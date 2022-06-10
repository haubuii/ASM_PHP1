<?php 
    if($_SERVER ['REQUEST_METHOD'] == 'POST'){
        $errors = array();
        
        // Mảng chứa lỗi
        $errors = [];

        // Validate tên sản phẩm
        if (empty(trim($_POST['category_name']))) {
            $errors['category_name']['required'] = 'Tên thể loại không được để trống. ' . '<br>';
        }
        if (strlen(trim($_POST['category_name'])) < 2) {
            $errors['category_name']['min'] = 'Tên thể loại phải có ít nhất 2 ký tự.';
        }

       

        // echo "<pre>";
        // print_r($errors);
        // echo "</pre>";

    }
?>