<?php
session_start();
include_once('../Controller/HomeController.php');
$product = new HomeController();

$product_id = (int)$_REQUEST['product_id'];
$value = (int)$_REQUEST['add_cart_value'];

$result = $product->add_cart($product_id, $value);
header('Location: /../web_demo/view/list_products.php');