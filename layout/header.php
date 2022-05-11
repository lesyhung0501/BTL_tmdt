<?php
    session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');

    $sql = "select * from Category";
    $menuItems = excuteResult($sql);

    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by Product.updated_at desc limit 0,8";

    $lastestItems = excuteResult($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/ban_thue_truyen/css/style.css">
    <title>Trang chủ</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ban_thue_truyen/js/slider_product.js">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <!--Important link from source https://bootsnipp.com/snippets/rlXdE-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

<style>
    .cart_icon {
        position: fixed;
        z-index: 1;
        right: 0px;
        top: 30%;
    }

    .cart_icon img {
        width: 60px;
    }

    .cart_icon .cart_count {
        background-color: red;
        color: white;
        font-size: 16px;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 10px;
        padding-right: 10px;
        font-weight: bold;
        border-radius: 12px;
        position: fixed;
        right: 40px;
    }
    
    .nav>li>a {
        padding: 30px 20px;
        font-size: 17px;
    }
</style>
</head>

<body>

<!--Nav bar-->
<div style="position:relative;">
    <ul class="nav navbar-light bg-light " style="margin-top: 0px !important; ">
        <li class="nav-item" style="margin-top: 0px !important;padding: 0 !important; ;">
            <img src="https://i.pinimg.com/originals/7a/a4/de/7aa4debaef01c10536832ee61e9d50a7.png" alt="logo" width="70px">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Trang chủ</a>
        </li>

        <?php
        foreach ($menuItems as $item) {
            echo '<li class="nav-item">
        <a class="nav-link" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
    </li>';
        }
        ?>

        <li class="nav-item">
            <a class="nav-link" href="contact.php">Liên hệ</a>
        </li>

        <li style="position: absolute; right: 0px">

            <a class="nav-link" href="admin/authen/logout.php">Đăng xuất</a>
        </li>
    </ul>
</div>

<!--End Nav bar-->