<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    include_once('../../../Controller/UserController.php');
    $user = new UserController();
    $result = $user->check_active($email, $token);
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../../public/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="text-center">
        <p class="text-center">Bạn đã đăng ký thành công!</p>
        <a href="/web_demo/view/admin/login/login.php">Đăng nhập ngay</a>
    </div>
</body>

</html>