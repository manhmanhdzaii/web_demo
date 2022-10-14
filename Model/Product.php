<?php
include_once('Database.php');
class Product extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll($name)
    {
        $condion = '';
        if ($name) {
            $condion = "WHERE p.name like '%$name%'";
        }
        $sql = "SELECT p.*,c.name as c_name FROM products p inner join categories c on p.category_id = c.id $condion";

        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function getColors()
    {
        $sql = "SELECT * FROM colors";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function getSizes()
    {
        $sql = "SELECT * FROM sizes";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function insert_product($name, $price, $color_id, $size_id, $category_id, $description, $img, $img_sub)
    {
        $cre_time = time();
        if ($img['name'] != '') {
            $path = '../../../upload/img';
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            $name_img = explode('.', $img['name']);
            $type = end($name_img);
            $img_name = 'img_' . $name_img[0] . rand(0, 9999) . $cre_time . '.' . $type;
            move_uploaded_file($img['tmp_name'], $path . '/' . $img_name);
            $img_product = 'upload/img' . '/' . $img_name;
        } else {
            $img_product = '';
        }
        $sql = "INSERT INTO products(name, price, color_id, size_id,category_id,img,description) VALUES ('$name', '$price', '$color_id', '$size_id', '$category_id', '$img_product', '$description')";
        $product = mysqli_query(parent::$conn, $sql);
        if ($product) {

            if ($img_sub['name'][0] != '') {
                $product_id = mysqli_insert_id(parent::$conn);
                $count_img = count($img_sub['name']);
                for ($i = 0; $i < $count_img; $i++) {
                    $path = '../../../upload/sub_img/' . $product_id;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_name = isset($img_sub['name'][$i]) ? $img_sub['name'][$i] : '';
                    $tmp_name = isset($img_sub['tmp_name'][$i]) ? $img_sub['tmp_name'][$i]  : '';
                    $file_name_array = explode('.', $file_name);
                    $type =  end($file_name_array);
                    $name_upload = 'img_' . $file_name_array[0] . rand(0, 9999) . '.' .  $type;
                    $path_up = $path . '/' . $name_upload;
                    $path_save = 'upload/sub_img/' . $product_id . '/' . $name_upload;
                    move_uploaded_file($tmp_name, $path_up);
                    $sql_sub = "INSERT INTO img_sub(path,product_id) VALUES('$path_save', '$product_id')";
                    $img_sub = mysqli_query(parent::$conn, $sql_sub);
                }
            }

            return true;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
}