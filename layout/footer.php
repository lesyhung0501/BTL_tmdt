<!-- Footer -->
<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>About Us</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>

                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Sản phẩm tương tự</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>

                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Góp ý</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            </hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p><u><a href="#">Công ty trách nhiệm hữu hạn hai thành viên Duy Hưng</a></u></p>
                <p class="h6">&copy 2021</p>
            </div>
            </hr>
        </div>
    </div>
</section>
<!-- ./Footer -->
<!-- Cart start -->
<?php
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$count = 0;
foreach($_SESSION['cart'] as $item) {
    $count += $item['num'];
}
?>
<script type="text/javascript">
    function addCart(productId, num) {
        $.post('request/ajax.php', {
            'action': 'cart',
            'id': productId,
            'num': num
        }, function(data) {
            location.reload()
        })
    }
</script>
<span class="cart_icon">
	<span class="cart_count"><?=$count?></span>
	<a href="cart.php"><img src="https://dalieudrmichaels.vn/uploads/20/03/13/31081745-mascot.png"></a>
</span>
<!-- Cart stop -->
</body>
</html>