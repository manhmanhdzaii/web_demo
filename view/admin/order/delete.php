<?php
if (isset($_GET['id'])) {
    include_once('../../../Controller/CartController.php');
    $cart = new CartController();
    $delete = $cart->delete($_GET['id']);
    if ($delete) {
        setcookie("success", "Xóa sản phẩm thành công", time() + 5, "/");
        header('Location: list.php');
    }
}