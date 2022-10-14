<?php
include_once('../../../Model/Product.php');
class ProductController
{
    public function getAll()
    {
        $product = new Product();
        if (isset($_GET["name"])) {
            $name = $_GET["name"];
        } else {
            $name = '';
        }
        $result = $product->getAll($name);
        return $result;
    }
    public function getCategories()
    {
        $product = new Product();
        $result = $product->getCategories();
        return $result;
    }
    public function getSizes()
    {
        $product = new Product();
        $result = $product->getSizes();
        return $result;
    }
    public function getColors()
    {
        $product = new Product();
        $result = $product->getColors();
        return $result;
    }
    public function insert_product()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $color_id = implode(',', $_POST['color_id']);
        $size_id = implode(',', $_POST['size_id']);
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $img = $_FILES['img'];
        $img_sub = $_FILES['img_sub'];
        $product = new Product();
        $result = $product->insert_product($name, $price, $color_id, $size_id, $category_id, $description, $img, $img_sub);
        return true;
    }
    public function delete($id)
    {
        $product = new Product();
        return $product->delete($id);
    }
}