<?php
include_once('../../../Model/User.php');
class UserController
{
    function check_login($email, $password)
    {
        $users = new User();
        $result = $users->check_login($email, $password);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_array($result);
                if ($user['active'] == 0) {
                    $body = file_get_contents('http://localhost/web_demo/mail/success.html');
                    $body = str_replace('<%name%>', $user['name'], $body);
                    $body = str_replace('<%email%>', $email, $body);
                    $body = str_replace('<%token%>', $user['token'], $body);
                    $users->send_mail($email, 'Đăng ký tài khoản thành công', $body);
                    header('Location: register_success.php');
                } else {
                    $_SESSION['name'] = $user['name'];
                    header('Location: ../index.php');
                }
            }
        } else {
            return false;
        }
    }
    function check_mail($email)
    {
        $users = new User();
        $result = $users->check_mail($email);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                return true;
            }
            return false;
        }
    }
    function store($name, $email, $password)
    {
        $users = new User();
        $result = $users->insert_user($name, $email, $password);

        if ($result) {
            $token = $result;
            $body = file_get_contents('http://localhost/web_demo/mail/success.html');
            $body = str_replace('<%name%>', $name, $body);
            $body = str_replace('<%email%>', $email, $body);
            $body = str_replace('<%token%>', $token, $body);
            $users->send_mail($email, 'Đăng ký tài khoản thành công', $body);
            header('Location: register_success.php');
        }
    }

    function check_active($email, $token)
    {
        $users = new User();
        $result = $users->check_active($email, $token);
        return true;
    }
    function check_change_pass($email, $token)
    {
        $users = new User();
        $result = $users->check_change_pass($email, $token);

        if ($result) {
            return true;
        } else {
            header('Location: login.php');
        }
    }
    function for_got_pass($email)
    {
        $users = new User();
        $arr = $users->get_token($email);
        if ($arr) {
            $token = $arr['token'];
            $body = file_get_contents('http://localhost/web_demo/mail/forgot_pass.html');
            $body = str_replace('<%name%>', $arr['name'], $body);
            $body = str_replace('<%email%>', $email, $body);
            $body = str_replace('<%token%>', $token, $body);
            $users->send_mail($email, 'Đổi mật khẩu', $body);
            header('Location: noti_forgot.php');
        }
    }
    function update_pass($email, $pass)
    {
        $users = new User();
        $result = $users->update_pass($email, $pass);
        return $result;
    }
}