<?php
session_start();
    require_once __DIR__."/send_mail/SendMail.php";
    require_once('database/dbhelper.php');

    // Kiểm tra nếu thực hiện thao tác cập nhật quyền của người dùng
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $errors = '';
        $email = '';
        // kiem tra email co ton tai va dung dinh dang
        if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $email = $_POST['email'];
        }
        else
        {
            $errors = "email";
        }
        if (empty($_POST['email'])) {
            $_SESSION['errors'] = 'Please enter your email';
            header('Location: forgot.php');
            exit();
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = 'Email address does not exist';
            header('Location: forgot.php');
            exit();
        }
        if (empty($errors) && !empty($email)) {
            $sql = "select * from User where email = '$email' and deleted = 0";
            $userExist = excuteResult($sql, true);


            if (empty($userExist)) {
                $_SESSION['errors'] = 'Email address does not exist ';
                header('Location: forgot.php');
                exit();
            }


            function rand_string($length){
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $size = strlen($chars);
                $str = '';
                for( $i = 0; $i < $length; $i++ ) {

                    $str .= $chars[rand(0,$size - 1)];

                }
                return $str;
            }
            $randPassword = rand_string(8);
            $title = 'Update password';
            $content = "<h3> Dear ". $userExist['fullname']. '</h3>';
            $content .= "<p>We have received a request to re-issue your password recently.</p>";
            $content .= "<p>We have updated and sent you a new password</p>";
            $content .= "<p>Your new password is : </p> <b>$randPassword</b>";
            $sendMai = SendMail::send($title, $content, $userExist['HoTen'], $userExist['Email']);

            if ($sendMai) {
//                $hash = password_hash($randPassword, PASSWORD_DEFAULT);
//                $sqlUpdate = "UPDATE `account` SET `Pass`= '". $hash ."' WHERE `IdAccount` = ". $userExist['IdAccount'];
//                $conn->query($sqlUpdate);
                $_SESSION['success'] = 'We sent you an email please check it';
                header('Location: forgot.php');
            } else {
                $_SESSION['errors'] = 'An error has occurred unable to retrieve the password';
                header('Location: forgot.php');
                exit();
            }
        }

    }