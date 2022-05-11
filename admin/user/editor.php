<?php
    $baseUrl = '../';
    $title = "Quản Lý Người Dùng";
$url = '../user/search_user.php';

require_once('../layouts/header.php');
    $id = $msg = $fullname = $email = $phone_number = $address = $role_id = '';
    require_once ('form_save.php');
    $id = getGet('id');
    if ($id != '' && $id > 0) {
        $sql = "select * from User where id = '$id'";
        $userItem = excuteResult($sql, true);
        if($userItem != null) {
            $fullname = $userItem['fullname'];
            $email = $userItem['email'];
            $phone_number = $userItem['phone_number'];
            $address = $userItem['address'];
            $role_id = $userItem['role_id'];
        } else {
            $id = 0;
        }
    } else {
        $id = 0;
    }



    $sql = "select * from Role";
    $roleItems = excuteResult($sql);
?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Chỉnh sửa tài khoản</h2>
                    <h5 style="color: red; font-size: 16px" class="text-center"><?=$msg?></h5>        </div>
                <div class="panel-body">
                    <form method="post" onsubmit="return validateForm();">
                        <div class="form-group">
                            <label for="usr">Họ và tên:</label>
                            <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$fullname?>">
                            <input type="text" name="id" value="<?=$id?>" hidden="true">
                        </div>
                        <div class="form-group">
                            <label for="usr">Role:</label>
                            <select class="form-control" name="role_id">
                                <option value="" required="true">-- Chọn --</option>
                                <?php
                                    foreach($roleItems as $role) {
                                        if($role['id'] == $role_id) {
                                            echo '<option selected value="'. $role['id'] .'">'.$role['name'].'</option>';

                                        }
                                        echo '<option value="'. $role['id'] .'">'.$role['name'].'</option>';
                                    }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại:</label>
                            <input required="true" type="tel" class="form-control" id="phone_number" name="phone_number" value="<?=$phone_number?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$address?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input <?=($id>0?'': 'required="true"')?> type="password" class="form-control" id="pwd" name="password" minlength="6">
                        </div>
                        <div class="form-group">
                            <label for="confirmation_pwd">Nhập lại mật khẩu:</label>
                            <input <?=($id>0?'': 'required="true"')?> type="password" class="form-control" id="confirmation_pwd" minlength="6">
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function validateForm() {
            $pwd = $('#pwd').val();
            $confirmPwd = $('#confirmation_pwd').val();
            if ($pwd != $confirmPwd) {
                alert("Mật khẩu không khớp")
                return false;
            }
            return true;
        }
    </script>
<?php
require_once('../layouts/footer.php');
?>