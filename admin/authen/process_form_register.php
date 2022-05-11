<?php

$fullname = $email = $msg = '';

if (!empty($_POST)) {
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');
    // validate
    if (empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) <6) {

    } else {
        $userExist = excuteResult("select * from User  where email = '$email'", true);
        if ($userExist != null) {
            $msg = 'Email đã tồn tại';
        } else {
            $created_at = $updated_at = date('Y-m-d H:i:s');
            $pwd = getSecurityMD5($pwd);
            $sql = "insert into User(fullname, email, password, role_id, 
                 created_at, updated_at, deleted) value ('$fullname', '$email', '$pwd', 2,'$created_at', '$updated_at', 0)";
            excute($sql);
            header("Location: login.php");
            die();
        }
    }
}