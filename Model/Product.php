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
            if ($img_sub['name'] != '') {
                $product_id = mysqli_insert_id(parent::$conn);
                $count_img = count($img_sub['name']);
                for ($i = 0; $i < $count_img; $i++) {
                    $path = '../../../upload/sub_img/' . $product_id;
                    if (!is_dir($path)) {
                        mkdir($path, 0777, TRUE);
                    }
                    $file_name = $img_sub['name'][$i];
                    $tmp_name = $img_sub['tmp_name'][$i];
                    $file_name_array = explode('.', $file_name);
                    $type =  end($file_name_array);
                    $name_upload = 'img_' . $file_name_array[0] . rand(0, 9999) . '.' .  $type;
                    $path_up = $path . '/' . $name_upload;
                    $path_save = 'upload/sub_img/' . $product_id . '/' . $name_upload;
                    move_uploaded_file($tmp_name, $path_up);
                    $sql_sub = "INSERT INTO img_sub(path,product_id) VALUES('$path_save', '$product_id')";
                    $img_query = mysqli_query(parent::$conn, $sql_sub);
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

    public function get_search($category, $size, $color, $search_price, $price_min, $price_max, $list_sort_post)
    {
        $condion = "WHERE id >= 1";
        if ($category != 0) {
            $condion .= " AND category_id = '$category'";
        }
        if ($color != 0) {
            $condion .= " AND FIND_IN_SET('$color', color_id)";
        }
        if ($size != 0) {
            $condion .= " AND FIND_IN_SET('$size', size_id)";
        }
        if ($search_price != 0) {
            $condion .= " AND price >= '$price_min' AND price <= '$price_max'";
        }
        if ($list_sort_post != 0) {
            if ($list_sort_post == 1) {
                $condion .= " ORDER BY price";
            } else {
                $condion .= " ORDER BY price DESC";
            }
        }
        $sql = "SELECT *FROM products $condion";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function getOne($id)
    {
        $sql = "SELECT * FROM products where id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function get_img($id)
    {
        $sql = "SELECT * FROM img_sub where product_id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function getCart($id)
    {
        $sql = "SELECT * FROM products where id IN ($id)";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function addCustomer($name, $phone, $email, $city, $note)
    {

        $sql = "INSERT INTO customers(name, phone, email, city, note) VALUES ('$name', '$phone', '$email', '$city', '$note')";
        $result = mysqli_query(parent::$conn, $sql);

        $customer_id = mysqli_insert_id(parent::$conn);

        $arr = array_keys($_SESSION['carts']);
        $id = implode(', ', $arr);
        $products = $this->getCart($id);

        $code = md5(uniqid(rand(), true));
        $cre_time = time();
        $sql = "INSERT INTO orders(code, customer_id, created_at) VALUES ('$code', '$customer_id', '$cre_time')";
        $result = mysqli_query(parent::$conn, $sql);
        $order_id = mysqli_insert_id(parent::$conn);

        while ($product = mysqli_fetch_array($products)) {
            $product_id = $product['id'];
            $amount = $_SESSION['carts'][$product['id']];
            $price = $product['price'];
            $sql = "INSERT INTO order_details(order_id, product_id, amount, price) VALUES ('$order_id', '$product_id', '$amount', '$price')";
            $result = mysqli_query(parent::$conn, $sql);
        }


        return true;
    }
}