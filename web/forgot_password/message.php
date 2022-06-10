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
        <div class="forgot_password">
            Password has been sent to your email
        </div>
        <div class="form_signin_container">

            <div class="form_signin_title"><a href="index.php?page_layout=sign_in">Return to Login</a></div>

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

    /* .form_signin_container {
        border-radius: 5px;
        background-color: white;
    } */

    .form_signin {
        margin: 40px;
    }

    .form_signin_item_1 {
        text-align: center;
    }

    .form_signin_title {
        font-size: 30px;
        font-weight: bold;
        text-decoration: underline;
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

    .forgot_password {
        font-size: 25px;
        color: rgb(0, 0, 0, 0.7);
        margin: 30px 0;
        margin-top: 15vh;
    }


    .err {
        color: red;
        font-size: 0.8em;
    }
</style>

</html>