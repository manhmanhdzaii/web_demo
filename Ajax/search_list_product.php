<?php
include_once('../Controller/HomeController.php');
$product = new HomeController();


$category = $_REQUEST['category'];
$size = $_REQUEST['size'];
$color = $_REQUEST['color'];
$search_price = $_REQUEST['search_price'];
$price_min = $_REQUEST['price_min'];
$price_max = $_REQUEST['price_max'];
$list_sort_post = $_REQUEST['list_sort_post'];
$products = $product->get_search($category, $size, $color, $search_price, $price_min, $price_max, $list_sort_post);
$result = [];
while ($product = mysqli_fetch_array($products)) {
    $result[] = $product;
}
echo json_encode($result);