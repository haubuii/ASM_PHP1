<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // https://a1websitepro.com/data-encryption-php-mysql-methods-implementation-open-ssl-encrypt/
    // Mã hoá Mat khau
    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
    function encryptthis($data, $key)
    {
        $encryption_key = base64_decode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    function decryptthis($data, $key)
    {
        $encryption_key = base64_decode($key);
        list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }

    $connect = mysqli_connect("localhost", "root", "", "fptphp1");
    $name = $_POST['user_name'];
    $sql_user_name = "SELECT * FROM user WHERE user_name = '$name'";
    $query_user_name = mysqli_query($connect, $sql_user_name);
    $password = $_POST['user_password'];

    // Mảng chứa lỗi
    $errors = [];
    $row_user = mysqli_fetch_assoc($query_user_name);
    if (!empty($row_user)) {
        if (decryptthis($row_user['user_password'] , $key)!= $password) {
            $errors['user_password'] = 'Password is incorrect';
        }
    } else {
        $errors['user_name'] = 'User name already exist';
    }

    if (isset($_POST['sign_in']) && empty($errors)) {
        
        if($row_user['role'] == 'user'){
            header('Location: index.php?page_layout=home');
        }else if($row_user['role'] == 'admin'){
            header('Location: ../index.php?page_layout=danhsach');
        }
    }






    // echo "<pre>";
    // print_r($errors);
    // echo "</pre>";

}
