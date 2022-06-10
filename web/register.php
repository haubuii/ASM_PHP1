<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <script src="https://kit.fontawesome.com/f892788311.js" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<?php
$connect = mysqli_connect("localhost", "root", "", "fptphp1");
$sql_user = "SELECT * FROM user";
$query_user = mysqli_query($connect, $sql_user);
include_once 'validation_user.php';


// Mã Hoá Mật Khẩu
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
function encryptthis($data, $key)
{
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}


// Insert User
if (isset($_POST['creat_account']) && empty($errors)) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $password_encryption = trim(encryptthis($password, $key));

    $sql_insert = "INSERT INTO user(user_name, user_password, user_email, role) 
        VALUES ('$name', '$password_encryption', '$email', 'user')";
    $query = mysqli_query($connect, $sql_insert);
    // header('location: index.php?page_layout=danhsach');
}

?>

<body>
    <div class="container_nav">
        <div class="head">
            <div class="nav_container">
                <div class="nav_menu">
                    <a href="index.php?page_layout=home" class="nav_menu_item">Home</a>
                    <a href="" class="nav_menu_item">Pages</a>
                    <a href="shop.html" class="nav_menu_item">Shop</a>
                    <a href="" class="nav_menu_item">Blog</a>
                    <a href="" class="nav_menu_item">Contact</a>
                </div>
                <a href="index.php?page_layout=home" class="nav_logo">
                    <img src="images/LOGO-NGUYTNGU-2.png" alt="">
                </a>
                <div class="nav_more">
                    <a href="index.php?page_layout=sign_in" class="nav_more_item">Account</a>
                    <a href="" class="nav_more_item">Shops</a>
                    <a href="" class="nav_more_item"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="form_signin_container">
            <form action="" class="form_signin" method="POST">
                <div class="form_signin_item_1">
                    <div class="form_signin_title">
                        Create an account
                    </div>
                    <div class="success"><?php
                                            if (isset($_POST['creat_account']) && empty($errors)) {
                                                echo "Create account success";
                                                // header('location: index.php?page_layout=danhsach');
                                            }
                                            ?>
                    </div>
                    <div class="form_signin_description">
                        Enter your credentials to access your account.
                    </div>



                </div>

                <div class="form_signin_item_2">
                    <div class="username">
                        <div>
                            <input type="text" class="" placeholder="Enter your username" name="user_name">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_name']['required'])) {
                                                echo $errors['user_name']['required'];
                                            }
                                            if (!empty($errors['user_name']['min'])) {
                                                echo $errors['user_name']['min'];
                                            }
                                            if (!empty($errors['user_name']['already_exist'])) {
                                                echo $errors['user_name']['already_exist'];
                                            }
                                            ?>
                        </span>

                    </div>
                    <div class="email">
                        <div>
                            <input type="text" class="email" placeholder="Enter your email" name="user_email">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_email']['required'])) {
                                                echo $errors['user_email']['required'];
                                            }
                                            if (!empty($errors['user_email']['available'])) {
                                                echo $errors['user_email']['available'];
                                            }
                                            ?>
                        </span>
                    </div>
                    <div class="password">
                        <div>
                            <input type="password" class="password" placeholder="Enter your password" name="user_password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_password']['required'])) {
                                                echo $errors['user_password']['required'];
                                            }
                                            if (!empty($errors['user_password']['min'])) {
                                                echo $errors['user_password']['min'];
                                            }
                                            ?>
                        </span>
                    </div>
                    <div class="confirm_password">
                        <div>
                            <input type="password" class="confirm_password" placeholder="Confirm your password" name="user_confirm_password">
                            <i class="fa-solid fa-lock fa-lock-2"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_confirm_password']['match'])) {
                                                echo $errors['user_confirm_password']['match'];
                                            }
                                            ?>
                        </span>
                    </div>
                </div>

                <button class="btn" type="submit" name="creat_account">Create account</button>

                <div class="register"><a href="index.php?page_layout=sign_in">Do You Have an Account?</a></div>
            </form>

        </div>

    </div>
</body>
<style>
    .err {
        color: red;
        font-size: 0.8em;
    }

    .success {
        color: #00a86b;
        font-size: 1em;
        margin: 10px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>




</html>