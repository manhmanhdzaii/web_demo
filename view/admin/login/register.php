<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
if (isset($_REQUEST['action'])) {
    include_once('../../../Controller/UserController.php');
    $user = new UserController();

    $err = array('name' => '', 'password' => '', 'email' => '', 're_pass' => '');
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $re_pass = $_REQUEST['re_pass'];
    $isValid = true;

    if ($name == '') {
        $err['name'] = 'Tên không được để trống';
        $isValid = false;
    }
    if ($email == '') {
        $err['email'] = 'Email không được để trống';
        $isValid = false;
    } else {
        $test_mail = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
        if (!preg_match($test_mail, $email)) {
            $isValid = false;
            $err['email'] = 'Email không đúng định dạng';
        } else {
            $check_exists = $user->check_mail($email);
            if ($check_exists) {
                $isValid = false;
                $err['email'] = 'Email đã tồn tại trong hệ thống';
            }
        }
    }
    if ($password  == '') {
        $err['password'] = 'Mật khẩu không được để trống';
        $isValid = false;
    } else {
        $test_pass = '/^(?=.*\d)(?=.*[A-Z])[\w]{8,32}$/';
        if (!preg_match($test_pass, $password)) {
            $err['password'] = 'Mật khẩu phải kèm chữ và chữ số,chữ cái in hoa';
            $isValid = false;
        }
    }
    if ($re_pass == '') {
        $err['re_pass'] = 'Nhập lại mật khẩu không được để trống';
        $isValid = false;
    }
    if ($password != '' && $re_pass != '' && $re_pass != $password) {
        $err['password'] = 'Mật khẩu và mật khẩu xác nhận không khớp';
    }

    if ($isValid) {
        $result = $user->store($name, $email, $password);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Đăng ký </title>

    <!-- Custom fonts for this template-->
    <link href="../../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../../public/css/login.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> Đăng ký tài khoản ! </h1>
                            </div>
                            <form class="user" id="form_register" method="post" action="?action=register">
                                <div class="form-group-vali">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Nhập tên...."
                                        value="<?php echo isset($_REQUEST['name']) ? $_REQUEST['name'] : ""; ?>">
                                </div>
                                <p class="err"><?php echo isset($err['name']) ? $err['name'] : ''; ?></p>
                                <div class="form-group-vali">
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Nhập email..."
                                        value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ""; ?>">
                                </div>
                                <p class="err"><?php echo isset($err['email']) ? $err['email'] : ''; ?></p>
                                <div class="form-group-vali">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" placeholder="Nhập mật khẩu.."
                                        value="<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ""; ?>">
                                </div>
                                <p class="err"><?php echo isset($err['password']) ? $err['password'] : ''; ?></p>
                                <div class="form-group-vali">
                                    <input type="password" class="form-control form-control-user" id="re_pass"
                                        name="re_pass" placeholder="Nhập lại mật khẩu...."
                                        value="<?php echo isset($_REQUEST['re_pass']) ? $_REQUEST['re_pass'] : ""; ?>">
                                </div>
                                <p class="err"><?php echo isset($err['re_pass']) ? $err['re_pass'] : ''; ?></p>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Đăng ký tài khoản
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/web_demo/view/admin/login/forgot.php"> Quên mật khẩu ? </a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/web_demo/view/admin/login/login.php"> Bạn đã có tài khoản ? Đăng
                                    nhập ! </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../../public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../../public/js/sb-admin-2.min.js"></script>
    <script src="../../../public/js/jquery.validate.min.js"></script>
    <script src="../../../public/js/login.js"></script>
</body>

</html>