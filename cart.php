<style>
    section {
        margin-top: 120px;
    }
    a {
        font-size: 15px;
    padding: 4px 0;
    display: inline-block;
    }
</style>

<?php
require_once('layout/header.php');



?>
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Thumbnail</th>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng  tiền</th>

                </tr>
                <?php
                    if(!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }
                    $index = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        echo '<tr>
                                <td>'.++$index.'</td>
                                <td><img src="'.$item['thumbnail'].'" style="max-height: 50px" alt=""></td>
                                <td>'.$item['title'].'</td>
                                <td>'.$item['author'].'</td>
                                <td>'.number_format($item['discount']).'VND</td>
                                <td style="display: flex"><button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
				<input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
				<button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
			</td>
                                <td>'.number_format($item['discount'] * $item['num']).' VND</td>
                                <td><button class="btn btn-danger"onclick="updateCart('.$item['id'].', 0)" >Xoá</button></td>
</tr>';


                    }
                ?>
            </table>
            <a href="checkout.php"><button class="btn btn-success" style="border-radius: 0px; font-size: 20px;">THANH TOÁN</button></a>

        </div>
    </div>

    <script type="text/javascript">
        function addMoreCart(id, delta) {
            num = parseInt($('#num_' + id).val())
            num += delta
            $('#num_' + id).val(num)

            updateCart(id, num)
        }

        function fixCartNum(id) {
            $('#num_' + id).val(Math.abs($('#num_' + id).val()))

            updateCart(id, $('#num_' + id).val())
        }

        function updateCart(productId, num) {
            $.post('request/ajax.php', {
                'action': 'update_cart',
                'id': productId,
                'num': num
            }, function(data) {
                location.reload()
            })
        }
    </script>
<?php
require_once('layout/footer.php');
?>