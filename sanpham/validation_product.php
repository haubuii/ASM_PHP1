<?php 
    if($_SERVER ['REQUEST_METHOD'] == 'POST'){
        $errors = array();
        
        // Mảng chứa lỗi
        $errors = [];

        // Validate tên sản phẩm
        if (empty(trim($_POST['product_name']))) {
            $errors['product_name']['required'] = 'Tên sản phẩm không được để trống. ' . '</br>';
        }
        if (strlen(trim($_POST['product_name'])) < 2) {
            $errors['product_name']['min'] = 'Tên sản phẩm phải có ít nhất 2 ký tự';
        }

        // Validate mô tả
        if (empty(trim($_POST['product_description']))) {
            $errors["product_description"]['required'] = 'Mô tả không được để trống. ' . '</br>';
        }
        if (strlen(trim($_POST['product_description'])) < 2) {
            $errors["product_description"]['min'] = 'Mô tả phải có ít nhất 2 ký tự';
        }

        // Validate giá
        if (empty(trim($_POST['product_price']))) {
            $errors['product_price']['required'] = 'Giá không được để trống. ' . '</br>';
        }
        if (strlen(trim($_POST['product_price'])) < 4) {
            $errors['product_price']['min'] = 'Giá phải có ít nhất 4 ký tự';
        }

        // Validate hình ảnh
        if (empty(trim($_POST['product_image']))) {
            $errors['product_image']['required'] = 'Hình ảnh không được để trống. ' . '</br>';
        }
        if (strlen(trim($_POST['product_image'])) < 5) {
            $errors['product_image']['min'] = 'Hình ảnh phải có ít nhất 5 ký tự';
        }

        // Validate giá khuyến mãi 
        if (empty(trim($_POST['product_sale']))) {
            $errors['product_sale']['required'] = 'Giá khuyến mãi không được để trống. ' . '</br>';
        }
        if (strlen(trim($_POST['product_sale'])) < 4) {
            $errors['product_sale']['min'] = 'Giá khuyến mãi phải có ít nhất 4 ký tự';
        }

        // Validate trạng thái
        if (empty(trim($_POST['product_status']))) {
            $errors['product_status']['required'] = 'Trạng thái không được để trống. ' . '</br>';
        }
        if (strlen(trim($_POST['product_status'])) < 4) {
            $errors['product_status']['min'] = 'Trạng thái phải có ít nhất 4 ký tự';
        }

        // echo "<pre>";
        // print_r($errors);
        // echo "</pre>";

    }
?>