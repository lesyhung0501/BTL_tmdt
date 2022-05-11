<?php
session_start();
require_once('utils/utility.php');
require_once('database/dbhelper.php');

$max_age = $min_age = 0;
//var_dump($_GET);
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
    <link rel="stylesheet" href="/path/to/jquery-ui.css">
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
                <input type="number" value="5" min="0" max="100" id="min_age" name="min_age"/>
                <input type="number" value="50" min="0" max="100" id="max_age" name="max_age"/>
	        </span>
            <input value="5" min="0" max="100" step="1" type="range"/>
            <input value="50" min="0" max="100" step="1" type="range"/>
            <input type="submit" value="submit">
        </form>

</div>

<!--End price range-->

<!--Lastest Product-->

<div style="float: right" >
    <form action="search.php" method="get">
        <input type="text" placeholder="search" name="tukhoa" style="margin-top: 10px; width: 200px; height: 40px">
        <input type="submit" name="timkiem" value="Tìm kiếm" style="height: 40px">
    </form>

</div>




<div class="container">
    <h1 style="text-align: center; margin-top: 70px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h1>
    <div class="row" style="margin-bottom: 100px; margin-top: 30px">
        <?php
        foreach($lastestItems as $item) {
            if ($item['deleted'] == 0) {
                echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="detail.php?id='.$item['id'].'"><p style="font-weight: bold;">'.$item['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
            }
            }

        ?>
    </div>
</div>


<!--End Lastest Product-->

<!--    Danh mục sản phảm   -->
<?php
$count = 0;
foreach ($menuItems as $item) {
    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = ".$item['id']." order by Product.updated_at desc limit 0,4";

    $items = excuteResult($sql);
//    if($items == null || count($items) < 4)continue;
?>
    <div style="background-color: <?=($count++%2 == 0)?'#f7f9fa':''?>;">
    <div class="container">
    <h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$item['name']?></h1>
    <div class="row" style="margin-bottom: 100px">
        <?php
        foreach($items as $pItem) {
            if ($pItem['deleted'] == 0) {
                echo '<div class="col-md-3 col-6 product-item">
					<a href="detail.php?id='.$pItem['id'].'"><img src="'.$pItem['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$pItem['category_name'].'</p>
					<a href="detail.php?id='.$pItem['id'].'"><p style="font-weight: bold;">'.$pItem['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($pItem['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$pItem['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
            }
        }

        ?>
    </div>
    </div>
        </div>
<?php
}
?>

<!--    End Danh mục sản phẩm  -->

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
