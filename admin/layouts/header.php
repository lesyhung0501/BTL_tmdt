<?php
    session_start();
    require_once($baseUrl.'../utils/utility.php');
    require_once($baseUrl.'../database/dbhelper.php');

    $user = getUserToken();
    var_dump($_SESSION['user']['role_id']);
    if($user == null) {
        header('Location: '.$baseUrl.'authen/login.php');
        die();
    }
    if($_SESSION['user']['role_id'] != 1) {
        header('Location: ../index.php');
        die();
    }
//    $roleId = getGet('id');
//    if($roleId['role_id'] == 2) {
//        header('Location: ../../index.php');
//        die();
//    }


?>

<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin</a>

    <form action=<?=$url?> method="get" style="width: 100%; height: 100%">
        <input  class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm" name="tukhoa" aria-label="Search">

    </form>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=$baseUrl?>authen/logout.php">Đăng xuất</a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=$baseUrl?>">
                            <i class="bi bi-house-fill"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$baseUrl?>category">
                            <i class="bi bi-folder"></i>
                            Danh Mục Sản Phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$baseUrl?>product">
                            <i class="bi bi-file-earmark-text"></i>
                            Sản Phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$baseUrl?>order">
                            <i class="bi bi-minecart"></i>
                            Quản Lý Đơn Hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$baseUrl?>feedback">
                            <i class="bi bi-question-circle-fill"></i>
                            Quản Lý Phản Hồi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$baseUrl?>user">
                            <i class="bi bi-people-fill"></i>
                            Quản Lý Người Dùng
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <!-- hien thi tung chuc nang cua trang quan tri START-->