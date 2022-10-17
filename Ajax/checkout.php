<?php
session_start();
include_once('../Controller/HomeController.php');
$product = new HomeController();

$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$city = $_REQUEST['city'];
$note = $_REQUEST['note'];

$result = $product->addCustomer($name, $phone, $email, $city, $note);
$result = true;
echo json_encode($result);