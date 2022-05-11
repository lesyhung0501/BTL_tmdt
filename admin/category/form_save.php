<?php
if (!empty($_POST)) {
    $id = getPost("id");
    $name = getPost("name");

    if($id >0) {
        //update
        $sql = "update Category set name = '$name' where id = $id";
        excute($sql);
    } else {
        //insert
        $sql = "insert into Category(name) value ('$name')";
        excute($sql);
    }
    header('Location: ../category');
}