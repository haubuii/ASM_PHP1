<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign_in.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">
    <script src="https://kit.fontawesome.com/f892788311.js" crossorigin="anonymous"></script>
    <title>Sign In</title>
</head>
<?php
include_once 'check_sign_in.php'; // Kiem tra dang nhap
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
                        Welcome Back
                    </div>
                    <div class="form_signin_description">
                        Enter your credentials to access your account.
                    </div>
                </div>

                <div class="form_signin_item_2">
                    <div class="username email">
                        <div>
                            <input type="text" class="email" placeholder="Enter your ussername" name="user_name">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_name'])) {
                                                echo $errors['user_name'];
                                            }
                                            ?></span>
                    </div>
                    <div class="password">
                        <div>
                            <input type="password" class="password" placeholder="Enter your password" name="user_password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_password'])) {
                                                echo $errors['user_password'];
                                            }
                                            ?>
                        </span>
                    </div>
                </div>

                <button class="btn" name="sign_in">Sign in</button>

                <div class="register"><a href="index.php?page_layout=register">Don't Have an Account?</a></div>
            </form>

        </div>
        <div class="forgot_password">
            Forgot your password? <a href="index.php?page_layout=forgot_password">Reset Password</a>
        </div>
    </div>
</body>
<style>
    .err {
        color: red;
        font-size: 0.8em;
    }
</style>

</html>