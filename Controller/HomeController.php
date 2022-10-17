<?php
include_once('../Model/Product.php');
class HomeController
{
    public function getAllProduct()
    {
        $product = new Product();
        $result = $product->getAll('');
        return $result;
    }
    public function getAllCate()
    {
        $product = new Product();
        $result = $product->getCategories();
        return $result;
    }
    public function get_search($category, $size, $color, $search_price, $price_min, $price_max, $list_sort_post)
    {
        $product = new Product();
        $result = $product->get_search($category, $size, $color, $search_price, $price_min, $price_max, $list_sort_post);
        return $result;
    }
    public function check_id($id)
    {
        $product = new Product();
        $result = $product->getOne($id);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                return true;
            }
            return false;
        }
    }
    public function getOne($id)
    {
        $product = new Product();
        $result = $product->getOne($id);
        return $result;
    }
    public function get_img($id)
    {
        $product = new Product();
        $result = $product->get_img($id);
        return $result;
    }
    public function add_cart($id, $val)
    {
        if (empty($_SESSION['carts'])) {
            $_SESSION['carts'][$id] = $val;
        } else {
            $exists =  array_key_exists($id, $_SESSION['carts']);
            if ($exists) {
                $_SESSION['carts'][$id] =  $_SESSION['carts'][$id] + $val;
            } else {
                $_SESSION['carts'][$id] = $val;
            }
        }

        return true;
    }
    public function getCart($id)
    {
        $product = new Product();
        $result = $product->getCart($id);
        return $result;
    }
    public function addCustomer($name, $phone, $email, $city, $note)
    {
        $product = new Product();
        $result = $product->addCustomer($name, $phone, $email, $city, $note);
        $_SESSION['carts'] = [];
        return $result;
    }
}