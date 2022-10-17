<?php
session_start();
$cart = $_REQUEST['product'];
$_SESSION['carts'] = $cart;
setcookie('update_cart', 'Update giỏ hàng thành công', time() + 5);
header("location:../view/cart.php");