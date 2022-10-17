<?php
include_once('../../../Model/Cart.php');
class CartController
{
    public function getAll()
    {
        $order = new Cart();
        $result = $order->getAll();
        return $result;
    }
    public function check_id($id)
    {
        $order = new Cart();
        $result = $order->getOne($id);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
            return false;
        }
    }
}