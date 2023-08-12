<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fa-IR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کافه کیک باران</title>

    <!-- icon -->
    <link rel="icon" type="image/png" href="assets/images/Logo1.png" />

    <!-- cdn icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- custom css file -->
    <link rel="stylesheet" href="assets/css/index-style.css">

    <!-- link vazir font-->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />

    <!---Boxicons CDN Setup for icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>

<body dir="rtl">
    <!-- header section start here -->
    <header class="header">
        <div class="logoContent">
            <a href="index.php" class="logo"><img src="assets/images/Logo1.png" alt="لوگو"></a>
            <h1 class="logoName">کافه کیک کیشا</h1>
        </div>

        <nav class="navbar">
            <a href="index.php">خانه</a>
            <a href="all_products.php">محصولات</a>
            <a href="all_blogs.php">بلاگ ها</a>
            <?php
            if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
            ?>
                <a href="logout.php">خروج از سایت
                    <?php echo (" ({$_SESSION["fullName"]}) ") ?>
                </a>
            <?php
            } else {
            ?>
                <a href="signin.php">ورود</a>
            <?php
            }
            ?>

            <a href="aboutUs.php">درباره ما</a>

            <?php
            if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] === "admin") {
            ?>
                <a href="admin_product.php">مدیریت محصولات</a>
                <a href="admin_blog.php">مدیریت بلاگ ها</a>
            <?php
            }
            ?>


        </nav>

        <div class="icon">
            <i class="fas fa-search" id="search"></i>
            <i class="fas fa-bars" id="menu-bar"></i>
        </div>

        <div class="search">
            <input type="search" placeholder="سرچ کنید...">
        </div>
    </header>
    <!-- header section ends -->