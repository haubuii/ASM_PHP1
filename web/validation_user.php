<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['user_name'];
    $sql_user_name = "SELECT * FROM user WHERE user_name = '$name'";
    $query_user_name = mysqli_query($connect, $sql_user_name);

    // Mảng chứa lỗi
    $errors = [];
    

    // Validate user_name
    if (empty(trim($_POST['user_name']))) {
        $errors['user_name']['required'] = "Username Can't be left blank" . '</br>';
    } else if (strlen(trim($_POST['user_name'])) < 2) {
        $errors['user_name']['min'] = 'Tên phải có ít nhất 2 ký tự';
    }
    else {
        if(mysqli_fetch_assoc($query_user_name)) {
            $errors['user_name']["already_exist"] = 'User name already exist';
        }
    }

    // Validate user_email
    if (empty(trim($_POST['user_email']))) {
        $errors['user_email']['required'] = " Email can't be left blank" . '</br>';
    } else if (!filter_var(trim($_POST['user_email']), FILTER_VALIDATE_EMAIL)) {
        $errors['user_email']['available'] = 'Invalid email. ' . '</br>';
    }

    // Validate user_password
    if (empty(trim($_POST['user_password']))) {
        $errors['user_password']['required'] = "Password can't be left blank" . '</br>';
    } else if (strlen(trim($_POST['user_password'])) < 6) {
        $errors['user_password']['min'] = 'Passwords must be at least 6 characters';
    } else if (trim($_POST['user_password']) != trim($_POST['user_confirm_password'])) {
        $errors['user_confirm_password']['match'] = 'Password does not match';
    }


    // echo "<pre>";
    // print_r($errors);
    // echo "</pre>";

}
