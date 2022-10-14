<?php
include_once('Database.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


include "../../../mail/PHPMailer/src/PHPMailer.php";
include "../../../mail/PHPMailer/src/Exception.php";
include "../../../mail/PHPMailer/src/SMTP.php";
class User extends Database
{

    public function __construct()
    {
        parent::__construct();
    }
    public function check_login($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    function check_mail($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    function insert_user($name, $email, $password)
    {
        $token = md5(uniqid(rand(), true));
        $sql = "INSERT INTO user(name, email, password, active,token) VALUES ('$name', '$email', '$password', 0, '$token')";
        $result = mysqli_query(parent::$conn, $sql);
        if ($result) {
            return $token;
        }
    }
    function send_mail($email, $title, $body)
    {
        $mail =  new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'manhtb1982@gmail.com';
            $mail->Password = 'dmftnsicklaxxfxj';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            //Recipients
            $mail->setFrom('manhtb1982@gmail.com', 'Web by Manh');
            $mail->addAddress($email);
            //Content
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            $mail->Subject =  $title;
            $mail->Body    = $body;
            return $mail->send();
        } catch (Exception $e) {
            die($e->errorMessage());
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    public function check_active($email, $token)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' and token = '$token'";
        $result = mysqli_query(parent::$conn, $sql);
        $active = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $active = $row['active'];
            }
            if ($active == '0') {
                $sql = "UPDATE user SET active = 1 WHERE email = '$email'";
                $result = mysqli_query(parent::$conn, $sql);
                return true;
            } else {
                header('Location: login.php');
            }
        } else {
            header('Location: login.php');
        }
    }
    public function check_change_pass($email, $token)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' and token = '$token'";
        $result = mysqli_query(parent::$conn, $sql);
        $count = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function get_token($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query(parent::$conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $arr['name'] = $row['name'];
                $arr['token'] = $row['token'];
                return $arr;
            }
        } else {
            return false;
        }
    }
    public function update_pass($email, $password)
    {
        $token = md5(uniqid(rand(), true));
        $sql = "UPDATE user SET password = '$password', token = '$token' WHERE email = '$email'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
}