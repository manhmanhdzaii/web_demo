<?php
include_once('Database.php');
class Cart extends Database
{
    function getAll()
    {
        $sql = "SELECT o.*, cus.name as cus_name, cus.phone as cus_phone, cus.email as cus_email FROM orders as o inner join customers as cus on o.customer_id = cus.id";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    function getOne($id)
    {
        $sql = "SELECT od.*, pd.name as pd_name FROM order_details as od inner join products as pd on od.product_id = pd.id WHERE od.order_id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM orders WHERE id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
}