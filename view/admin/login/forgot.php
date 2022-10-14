<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
include_once('../../../Controller/UserController.php');
$user = new UserController();

if (isset($_REQUEST['action'])) {
    $err = array('email' => '');
    $email = $_REQUEST['email'];
    $isValid = true;
    if ($email == '') {
        $err['email'] = 'Email không được để trống';
        $isValid = false;
    } else {
        $check_exists = $user->check_mail($email);
        if (!$check_exists) {
            $isValid = false;
            $err['email'] = 'Không tìm thấy email trong hệ thống';
        }
    }
    if ($isValid) {
        $user->for_got_pass($email);
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

    <title> Quên mật khẩu </title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"> Quên mật khẩu </h1>
                                        <p class="mb-4">Vui lòng nhập vào email mà bạn đã sử dụng để đăng ký</p>
                                    </div>
                                    <form class="user" method="post" id="form_forgot" action="?action=forgot">
                                        <div class="form-group-vali">
                                            <input type="text" class="form-control form-control-user" id="email"
                                                aria-describedby="emailHelp" placeholder="Nhập email" name="email">
                                        </div>
                                        <p class="err"><?php echo isset($err['email']) ? $err['email'] : ''; ?></p>
                                        <button type="submit" href="login.html"
                                            class="btn btn-primary btn-user btn-block">
                                            Đổi mật khẩu
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/web_demo/view/admin/login/register.php"> Tạo tài khoản
                                            mới
                                            ! </a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/web_demo/view/admin/login/login.php"> Bạn đã có tài
                                            khoản, đăng nhập ! </a>
                                    </div>
                                </div>
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