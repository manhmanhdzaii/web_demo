<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
if (isset($_REQUEST['action'])) {
    $err = array('email' => '', 'password' => '');
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $isValid = true;
    if ($email == '') {
        $err['email'] = 'Tên đăng nhập không được để trống';
        $isValid = false;
    }
    if ($password  == '') {
        $err['password'] = 'Mật khẩu không được để trống';
        $isValid = false;
    }
    if ($isValid) {
        include_once('../../../Controller/UserController.php');
        $user = new UserController();
        $result = $user->check_login($email, $password);
        if ($result == false) {
            $err['email'] = "Tài khoản hoặc mật khẩu chưa chính xác";
        }
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
    <title> Login </title>
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Đăng nhập người dùng ! </h1>
                                    </div>
                                    <form class="user" method="post" action="?action=login" id="login_form">
                                        <div class="form-group-vali">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nhập email..." name="email"
                                                value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ""; ?>">
                                        </div>
                                        <p class="err"><?php echo isset($err['email']) ? $err['email'] : ''; ?></p>
                                        <div class="form-group-vali">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Nhập mật khẩu.." name="password">
                                        </div>
                                        <p class="err"><?php echo isset($err['password']) ? $err['password'] : ''; ?>
                                        </p>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/web_demo/view/admin/login/forgot.php"> Quên mật khẩu?
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/web_demo/view/admin/login/register.php"> Đăng ký tài
                                            khoản mới! </a>
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