<?php
session_start();
require_once('utils/utility.php');
require_once('database/dbhelper.php');

$max_age = $_GET['max_age'];
$min_age = $_GET['min_age'];
//var_dump($_GET);
$sql = "select * from Category";
$menuItems = excuteResult($sql);

$sql = "select * from Product where  min_age between '".$min_age."' and '".$max_age."' limit 0,8";

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
    <link rel="stylesheet" href="/path/to/jquery-ui.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- Latest compiled and minified CSS -->
    <!-- https://xstore.8theme.com/demos/hosting/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
    <style>
        #slider-text {
            padding-top: 40px;
            display: block;
        }

        #slider-text .col-md-6 {
            overflow: hidden;
        }

        #slider-text h2 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 3px;
            margin: 30px auto;
            padding-left: 40px;
        }

        #slider-text h2::after {
            border-top: 2px solid #c7c7c7;
            content: "";
            position: absolute;
            bottom: 35px;
            width: 100%;
        }

        #itemslider h4 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 400;
            font-size: 12px;
            margin: 10px auto 3px;
        }

        #itemslider h5 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bold;
            font-size: 12px;
            margin: 3px auto 2px;
        }

        #itemslider h6 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 300;
        ;
            font-size: 10px;
            margin: 2px auto 5px;
        }

        .badge {
            background: #b20c0c;
            position: absolute;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            line-height: 31px;
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 300;
            font-size: 14px;
            border: 2px solid #FFF;
            box-shadow: 0 0 0 1px #b20c0c;
            top: 5px;
            right: 25%;
        }

        #slider-control img {
            padding-top: 60%;
            margin: 0 auto;
        }

        @media screen and (max-width: 992px) {
            #slider-control img {
                padding-top: 70px;
                margin: 0 auto;
            }
        }

        .carousel-showmanymoveone .carousel-control {
            width: 4%;
            background-image: none;
        }

        .carousel-showmanymoveone .carousel-control.left {
            margin-left: 5px;
        }

        .carousel-showmanymoveone .carousel-control.right {
            margin-right: 5px;
        }

        .carousel-showmanymoveone .cloneditem-1,
        .carousel-showmanymoveone .cloneditem-2,
        .carousel-showmanymoveone .cloneditem-3,
        .carousel-showmanymoveone .cloneditem-4,
        .carousel-showmanymoveone .cloneditem-5 {
            display: none;
        }

        @media all and (min-width: 768px) {
            .carousel-showmanymoveone .carousel-inner>.active.left,
            .carousel-showmanymoveone .carousel-inner>.prev {
                left: -50%;
            }
            .carousel-showmanymoveone .carousel-inner>.active.right,
            .carousel-showmanymoveone .carousel-inner>.next {
                left: 50%;
            }
            .carousel-showmanymoveone .carousel-inner>.left,
            .carousel-showmanymoveone .carousel-inner>.prev.right,
            .carousel-showmanymoveone .carousel-inner>.active {
                left: 0;
            }
            .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
                display: block;
            }
        }

        @media all and (min-width: 768px) and (transform-3d),
        all and (min-width: 768px) and (-webkit-transform-3d) {
            .carousel-showmanymoveone .carousel-inner>.item.active.right,
            .carousel-showmanymoveone .carousel-inner>.item.next {
                -webkit-transform: translate3d(50%, 0, 0);
                transform: translate3d(50%, 0, 0);
                left: 0;
            }
            .carousel-showmanymoveone .carousel-inner>.item.active.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev {
                -webkit-transform: translate3d(-50%, 0, 0);
                transform: translate3d(-50%, 0, 0);
                left: 0;
            }
            .carousel-showmanymoveone .carousel-inner>.item.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev.right,
            .carousel-showmanymoveone .carousel-inner>.item.active {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                left: 0;
            }
        }

        @media all and (min-width: 992px) {
            .carousel-showmanymoveone .carousel-inner>.active.left,
            .carousel-showmanymoveone .carousel-inner>.prev {
                left: -16.666%;
            }
            .carousel-showmanymoveone .carousel-inner>.active.right,
            .carousel-showmanymoveone .carousel-inner>.next {
                left: 16.666%;
            }
            .carousel-showmanymoveone .carousel-inner>.left,
            .carousel-showmanymoveone .carousel-inner>.prev.right,
            .carousel-showmanymoveone .carousel-inner>.active {
                left: 0;
            }
            .carousel-showmanymoveone .carousel-inner .cloneditem-2,
            .carousel-showmanymoveone .carousel-inner .cloneditem-3,
            .carousel-showmanymoveone .carousel-inner .cloneditem-4,
            .carousel-showmanymoveone .carousel-inner .cloneditem-5,
            .carousel-showmanymoveone .carousel-inner .cloneditem-6 {
                display: block;
            }
        }

        @media all and (min-width: 992px) and (transform-3d),
        all and (min-width: 992px) and (-webkit-transform-3d) {
            .carousel-showmanymoveone .carousel-inner>.item.active.right,
            .carousel-showmanymoveone .carousel-inner>.item.next {
                -webkit-transform: translate3d(16.666%, 0, 0);
                transform: translate3d(16.666%, 0, 0);
                left: 0;
            }
            .carousel-showmanymoveone .carousel-inner>.item.active.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev {
                -webkit-transform: translate3d(-16.666%, 0, 0);
                transform: translate3d(-16.666%, 0, 0);
                left: 0;
            }
            .carousel-showmanymoveone .carousel-inner>.item.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev.right,
            .carousel-showmanymoveone .carousel-inner>.item.active {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                left: 0;
            }
        }
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
        a {
        font-size: 15px;
    padding: 4px 0;
    display: inline-block;
    }
        .nav>li>a {
        padding: 30px 20px;
        font-size: 17px;
    }
    </style>
</head>

<body>

<!--Nav bar-->
<div>
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

    <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" style="display: none">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img height="500px" class="d-block w-100" src="https://images.squarespace-cdn.com/content/v1/5330a186e4b05c0d7e0a37ee/1504197307735-PQQVG6I97794TTRBN1AA/Slider+1+-+Book+Design+-+Book+Designer+-+Parke+Book+Creations.jpg?format=1500w"alt="First slide">
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0, 0, 0, 0.5); padding: 10px; margin-bottom: 30px">
                    <h3>Một cuốn sách thực sự hay nên đọc trong tuổi trẻ, rồi đọc lại khi đã trưởng thành, và một nửa lúc tuổi già, giống như một tòa nhà đẹp nên được chiêm ngưỡng trong ánh bình minh, nắng trưa và ánh trăng.</h3>
                    <p>Robertson Davies</p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="500px" class="d-block w-100" src="https://s19499.pcdn.co/wp-content/uploads/2020/02/slider-istock-kindle-ebook-electronic-book-ebooks-ereader-e-reader-e-book-ereaders-kindles.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0, 0, 0, 0.5); padding: 10px; margin-bottom: 30px">
                    <h3 style="opacity: 1">Những gì sách dạy chúng ta cũng giống như lửa. Chúng ta lấy nó từ nhà hàng xóm, thắp nó trong nhà ta, đem nó truyền cho người khác và nó trở thành tài sản của tất cả mọi người.</h3>
                    <p>Voltaire</p>
                </div>
            </div>
            <div class="carousel-item">
                <img height="500px" class="d-block w-100" src="https://sudospaces.com/luanvan1080-com/2019/04/thiet-ke-slide-powerpoint-chuyen-nghiep-1.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0, 0, 0, 0.5); padding: 10px; margin-bottom: 30px">
                    <h3>Tất cả những gì con người làm, nghĩ hoặc trở thành được bảo tồn một cách kỳ diệu trên những trang sách.</h3>
                    <p>Thomas Carlyle</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--End Slider-->
</div>
<!--Price range-->
<h3 style="margin-top: 20px; text-align: center">Tìm kiếm theo độ tuổi</h3>
<div class="range-slider" style="margin-top: 20px">

    <form action="index_age.php" method="get">
            <span>
                <input type="number" value="<?=$min_age?>" min="0" max="100" id="min_age" name="min_age"/>
                <input type="number" value="<?=$max_age?>" min="0" max="100" id="max_age" name="max_age"/>
	        </span>
        <input value="<?=$min_age?>" min="0" max="100" step="1" type="range"/>
        <input value="<?=$max_age?>" min="0" max="100" step="1" type="range"/>
        <input type="submit" value="submit">
    </form>

</div>

<!--End price range-->


<br/><br/>

<!--Lastest Product-->

<div style="float: right" >
    <form action="search.php" method="get">
        <input type="text" placeholder="search" name="tukhoa" style="margin-top: 10px; width: 200px; height: 40px">
        <input type="submit" name="timkiem" value="Tìm kiếm" style="height: 40px">
    </form>

</div>




<div class="container">
    <h1 style="text-align: center; margin-top: 70px; margin-bottom: 20px;">SẢN PHẨM PHÙ HỢP VỚI ĐỘ TUỔI <?=$min_age?> đến <?=$max_age?></h1>

    <!--    Item slider-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                    <div class="carousel-inner">

                        <div class="item active" >
                            <div class="col-xs-12 col-sm-12 col-md-2" style="display: none">
                                <a href="#"><img width="200px" src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" class="img-responsive center-block"></a>
                                <h4 class="text-center">MAYORAL SUKNJA</h4>
                                <h5 class="text-center">200,00 TK</h5>
                            </div>
                        </div>

                        <?php
                        foreach($lastestItems as $item) {
                            if ($item['deleted'] == 0) {
                                echo '<div class="item ">
        <div class="col-xs-12 col-sm-12 col-md-2">
            <a href="detail.php?id='.$item['id'].'"><img width="200px" src="'.$item['thumbnail'].'" class="img-responsive center-block"></a>
            <h4 class="text-center">'.$item['title'].'</h4>
            <h5 class="text-center">'.number_format($item['discount']).' VND</h5>
        </div>
    </div>';
                            }
                        }

                        ?>

                    </div>

                    <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
                        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Item slider end-->
</div>


<!--End Lastest Product-->



<?php
require_once ('layout/footer.php');
?>

<script>
    (function() {

        var parent = document.querySelector(".range-slider");
        if(!parent) return;

        var
            rangeS = parent.querySelectorAll("input[type=range]"),
            numberS = parent.querySelectorAll("input[type=number]");

        rangeS.forEach(function(el) {
            el.oninput = function() {
                var slide1 = parseFloat(rangeS[0].value),
                    slide2 = parseFloat(rangeS[1].value);

                if (slide1 > slide2) {
                    [slide1, slide2] = [slide2, slide1];
                    // var tmp = slide2;
                    // slide2 = slide1;
                    // slide1 = tmp;
                }

                numberS[0].value = slide1;
                numberS[1].value = slide2;
            }
        });

        numberS.forEach(function(el) {
            el.oninput = function() {
                var number1 = parseFloat(numberS[0].value),
                    number2 = parseFloat(numberS[1].value);

                if (number1 > number2) {
                    var tmp = number1;
                    numberS[0].value = number2;
                    numberS[1].value = tmp;
                }

                rangeS[0].value = number1;
                rangeS[1].value = number2;

            }
        });

    })();
    function test() {
        var min1 = document.getElementById("min_age").value;
        var max1 = document.getElementById("max_age").value;
        document.cookie="min_age_js="+min1;
        document.cookie="max_age_js="+max1;

    }
    $(document).ready(function() {

        $('#itemslider').carousel({
            interval: 3000
        });

        $('.carousel-showmanymoveone .item').each(function() {
            var itemToClone = $(this);

            for (var i = 1; i < 6; i++) {
                itemToClone = itemToClone.next();

                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }

                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
            }
        });
    });

</script>

<style>
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    .nav {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        width: 100%; z-index: 99999;
    }
    .navbar-custom {
        background-color: lightgreen;
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
        color: green;
    }
    .navbar-custom {
        background: none;
    }

    .range-slider {
        width: 300px;
        margin: auto;
        text-align: center;
        position: relative;
        height: 6em;
    }

    .range-slider svg,
    .range-slider input[type=range] {
        position: absolute;
        left: 0;
        bottom: 0;
    }

    input[type=number] {
        border: 1px solid #ddd;
        text-align: center;
        font-size: 1.6em;
        -moz-appearance: textfield;
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    input[type=number]:invalid,
    input[type=number]:out-of-range {
        border: 2px solid #ff6347;
    }

    input[type=range] {
        -webkit-appearance: none;
        width: 100%;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #2497e3;
    }

    input[type=range]:focus::-ms-fill-lower {
        background: #2497e3;
    }

    input[type=range]:focus::-ms-fill-upper {
        background: #2497e3;
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        animate: 0.2s;
        background: #2497e3;
        border-radius: 1px;
        box-shadow: none;
        border: 0;
    }

    input[type=range]::-webkit-slider-thumb {
        z-index: 2;
        position: relative;
        box-shadow: 0px 0px 0px #000;
        border: 1px solid #2497e3;
        height: 18px;
        width: 18px;
        border-radius: 25px;
        background: #a1d0ff;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }

    input[type=range]::-moz-range-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        animate: 0.2s;
        background: #2497e3;
        border-radius: 1px;
        box-shadow: none;
        border: 0;
    }

    input[type=range]::-moz-range-thumb {
        z-index: 2;
        position: relative;
        box-shadow: 0px 0px 0px #000;
        border: 1px solid #2497e3;
        height: 18px;
        width: 18px;
        border-radius: 25px;
        background: #a1d0ff;
        cursor: pointer;
    }

    input[type=range]::-ms-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        animate: 0.2s;
        background: transparent;
        border-color: transparent;
        color: transparent;
    }

    input[type=range]::-ms-fill-lower,
    input[type=range]::-ms-fill-upper {
        background: #2497e3;
        border-radius: 1px;
        box-shadow: none;
        border: 0;
    }

    input[type=range]::-ms-thumb {
        z-index: 2;
        position: relative;
        box-shadow: 0px 0px 0px #000;
        border: 1px solid #2497e3;
        height: 18px;
        width: 18px;
        border-radius: 25px;
        background: #a1d0ff;
        cursor: pointer;
    }
</style>
