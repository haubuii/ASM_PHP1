<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/stylesheet.css">
    <link rel="stylesheet" href="forgot_password.css">
    <script src="https://kit.fontawesome.com/f892788311.js" crossorigin="anonymous"></script>
    <title>Sign In</title>
</head>
<?php

include_once 'mail/sendmail.php'; // Gui mail
?>

<body>
    <div class="container_nav">
        <div class="head">
            <div class="nav_container">
                <div class="nav_menu">
                    <a href="../index.php?page_layout=home" class="nav_menu_item">Home</a>
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
                        Forgot Password
                    </div>
                    <!-- <div class="form_signin_description">
                        Enter your credentials to access your account.
                    </div> -->
                </div>

                <div class="form_signin_item_2">
                    <div class="password email">
                        <div>
                            <input type="email" class="email" placeholder="Enter your email" name="user_email">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <span class="err"><?php
                                            if (!empty($errors['user_email'])) {
                                                echo $errors['user_email'];
                                            }
                                            ?>
                        </span>
                    </div>

                </div>

                <button class="btn" name="get_password">Get password</button>

                <div class="register"><a href="index.php?page_layout=sign_in">Do You Have an Account?</a></div>
            </form>

        </div>
        <div class="forgot_password">
            Forgot your password? <a href="">Reset Password</a>
        </div>
    </div>
</body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'NeueHaasGroteskText Pro';
    }

    body {
        font-size: 20px;
        color: rgb(0, 0, 0, 0.8);
        background-image: linear-gradient(-30deg, rgb(224, 237, 244), rgb(196, 230, 245));
        height: 100vh;
    }

    a {
        text-decoration: none;
        color: rgb(0, 0, 0, 0.8);
    }

    /* ------------------------------ NAV_HEAD ----------------------------------------- */

    .container_nav {
        width: 85%;
        margin: 40px auto;
    }

    .head {
        padding-bottom: 30px;
        border-bottom: 1px solid #ccc;
    }

    .nav_container {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        overflow: auto
    }

    .nav_menu,
    .nav_more {
        width: 35%;

    }

    .nav_logo {
        width: 30%;
        text-align: center;
    }

    .nav_logo img {
        width: 250px;
        margin: auto;
    }

    .nav_menu_item {
        margin-right: 40px;
    }

    .nav_more_item {
        float: right;
        margin-left: 40px;
    }



    /* ======================================== Form Signin ============================================= */

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 100px;
    }

    .form_signin_container {
        border-radius: 5px;
        background-color: white;
    }

    .form_signin {
        margin: 40px;
    }

    .form_signin_item_1 {
        text-align: center;
    }

    .form_signin_title {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form_signin_description {
        font-size: 16px;
        color: rgb(0, 0, 0, 0.35);
    }

    .form_signin_item_2 {
        margin-top: 50px;
    }

    .email {
        position: relative;
    }

    .fa-envelope {
        position: absolute;
        left: 20px;
        transform: translateY(14px);
    }

    .password {
        margin: 15px 0;
        position: relative;
    }

    .fa-lock {
        position: absolute;
        left: 20px;
        transform: translateY(28px);
    }

    .form_signin_item_2 input {
        padding: 18px;
        width: 400px;
        border-radius: 7px;
        border: 1px solid #ccc;
    }

    .form_signin_item_2 i {
        font-size: 25px;
    }

    .form_signin_item_2 ::placeholder {
        padding-left: 40px;
        font-size: 16px;
    }

    .btn {
        padding: 14px;
        width: 100%;
        background-color: black;
        color: white;
        font-size: 17px;
        border-radius: 7px;
        cursor: pointer;
    }

    .register {
        width: 100%;
        text-align: center;
        margin: 30px 0 0 0;
    }

    .register a {
        color: rgb(0, 0, 0, 0.8);
        font-size: 16px;
        text-decoration: underline;
    }

    .forgot_password {
        font-size: 16px;
        color: rgb(0, 0, 0, 0.35);
        margin-top: 40px;
    }

    .forgot_password a {
        font-size: 17px;
        text-decoration: underline;
    }

    .err {
        color: red;
        font-size: 0.8em;
    }
</style>

</html>