<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user == null) {
    die();
}

if(!empty($_POST)) {
    $action = getPost('action');

    switch ($action) {
        case 'delete':
            deleteCategory();
            break;
    }
}

function deleteCategory() {
    $id = getPost('id');

    $sql = "select count(*) as total from Product where category_id = $id and deleted = 0";
    $data = excuteResult($sql, true);
    $total = $data['total'];
    if($total > 0) {
        echo 'Danh mục vẫn còn sản phẩm, không thể xóa';
        die();
    }

    $sql = "delete from Category where id = $id";
    excute($sql);
}