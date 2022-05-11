<?php
$title = 'Thêm/Sửa Sản Phẩm';
$baseUrl = '../';
$url = '../product/search_product.php';
require_once('../layouts/header.php');

$id = $author = $thumbnail = $title = $price = $discount = $category_id = $description = $min_age = '';
require_once('form_save.php');

$id = getGet('id');
if($id != '' && $id > 0) {
    $sql = "select * from Product where id = '$id' and deleted = 0";
    $userItem = excuteResult($sql, true);
    if($userItem != null) {
        $thumbnail = $userItem['thumbnail'];
        $title = $userItem['title'];
        $price = $userItem['price'];
        $discount = $userItem['discount'];
        $category_id = $userItem['category_id'];
        $description = $userItem['description'];
        $author = $userItem['author'];
        $min_age = $userItem['min_age'];
    } else {
        $id = 0;
    }
} else {
    $id = 0;
}

$sql = "select * from Category";
$categoryItems = excuteResult($sql);
?>




    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Thêm/Sửa sản phẩm</h2>
                <div class="panel-body">
                    <form method="post" >
                        <div class="row">
                            <div class="col-md-9 col-12">
                                <div class="form-group">
                                    <label for="usr">Tên sản phẩm</label>
                                    <input required="true" type="text" class="form-control" id="usr" name="title" value="<?=$title?>">
                                    <script>console.log('<?=$author?> ');</script>
                                    <input type="text" name="id" value="<?=$id?> " hidden="true">
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả:</label>
                                    <textarea class="form-control" rows="5" name="description" id="description"><?=$description?></textarea>
                                </div>
                                <button class="btn btn-success">Submit</button>



                            </div>

                            <div class="col-md-3 col-12" style="border:solid white 1px; padding-top: 10px;box-shadow: 5px 10px 18px #888888;">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail :</label>
                                    <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateImg()">
                                    <img id="img" src="<?=$thumbnail?>" style="max-height: 160px;padding-top: 10px; margin: auto">
                                </div>
                                <div class="form-group">
                                    <label for="usr">Danh mục sản phẩm:</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="" required="true">-- Chọn --</option>
                                        <?php
                                        foreach($categoryItems as $item) {
                                            if($item['id'] == $category_id) {
                                                echo '<option selected value="'. $item['id'] .'">'.$item['name'].'</option>';

                                            }
                                            echo '<option value="'. $item['id'] .'">'.$item['name'].'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="author">Tác giả:</label>
                                    <input required="true" type="text" class="form-control" id="author" name="author" value="<?=$author?>">
                                </div>
                                <div class="form-group">
                                    <label for="min_age">Độ tuổi thích hợp:</label>
                                    <input required="true" type="number" class="form-control" id="min_age" name="min_age" value="<?=$min_age?>">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá:</label>
                                    <input required="true" type="number" class="form-control" id="price" name="price" value="<?=$price?>">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Giá sau khi giảm:</label>
                                    <input required="true" type="number" class="form-control" id="discount" name="discount" value="<?=$discount?>">
                                </div>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateImg() {
            $('#img').attr('src', $('#thumbnail').val())
        }
    </script>

        <script>
            $('#description').summernote({
                placeholder: 'Nhập nội dung dữ liệu',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']]
                ]
            });
        </script>
<?php
require_once('../layouts/footer.php');
?>