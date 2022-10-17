<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/reset.css" type="text/css" />
    <?php if (isset($css)) {
        for ($i = 0; $i < count($css); $i++) { ?>
    <link rel="stylesheet" href="../public/css/<?= $css[$i] ?>.css" type="text/css" />
    <?php }
    } ?>

    <link rel="stylesheet" href="../public/css/header.css" type="text/css" />
    <link rel="stylesheet" href="../public/css/footer.css" type="text/css" />
</head>

<body>
    <!-- Headerrrrr -->
    <div class="header">
        <div class="header_contact">
            <div class="h_contact_phone">
                <div class="ct_phone_img">
                    <img src="../public/images/phone_header.png" alt="" />
                </div>
                <div class="ct_phone_content">Hotline: (01) 23 456 789</div>
            </div>
            <div class="h_contact_title">Welcome Guest, have a nice day!</div>
        </div>
        <div class="header_content">
            <div class="header_logo">
                <a href="#"><img src="../public/images/logo.png" alt="" /></a>
            </div>
            <div class="header_navbar">
                <a href="/web_demo/view">
                    <div class="h_navbar_item h_navbar_item_tick">HOME</div>
                </a>
                <a href="#">
                    <div class="h_navbar_item">ABOUT US</div>
                </a>
                <a href="/web_demo/view/list_products.php">
                    <div class="h_navbar_item h_navbar_item_down">
                        <p>SHOP</p>
                        <img src="../public/images/img_down.png" alt="" />
                    </div>
                </a>
                <a href="#">
                    <div class="h_navbar_item">CONTACT</div>
                </a>
            </div>
            <div class="header_cart">
                <div class="header_cart_img">
                    <a href="/web_demo/view/cart.php">
                        <img src="../public/images/cart_img.png" alt="" />
                    </a>
                    <div class="cart_img_absolute">
                        <?php echo !empty($_SESSION['carts']) ? count($_SESSION['carts']) : 0; ?></div>
                </div>
                <div class="header_cart_content">$ 0.00</div>
            </div>
            <div class="header_menu">
                <img src="../public/images/menu.png" alt="" />
            </div>
        </div>
    </div>
    <div class="header_sub hidden">
        <div class="header_sub_container">
            <a href="#">
                <div class="header_sub_arrow">
                    <img src="../public/images/hd_sub_arrow.png" alt="">
                    <div class="header_sub_title hidden">
                        SHOP
                    </div>
                </div>
            </a>
            <div class="header_sub_box1">
                <a href="#">
                    <div class="h_sub_b1_item">
                        <div class="h_sub_b1_item_content h_navbar_item_tick">HOME</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="h_sub_b1_item">
                        <div class="h_sub_b1_item_content">ABOUT US</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="h_sub_b1_item h_sub_b1_item_shop">
                        <div class="h_sub_b1_item_content">SHOP</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="h_sub_b1_item">
                        <div class="h_sub_b1_item_content">CONTACT</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
                <div class="h_sub_cart">
                    CART (0)
                </div>
            </div>
            <div class="header_sub_box2 hidden">
                <a href="#">
                    <div class="h_sub_b1_item">
                        <div class="h_sub_b1_item_content">FOR WOMEN</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="h_sub_b1_item">
                        <div class="h_sub_b1_item_content">FOR MEN</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="h_sub_b1_item">
                        <div class="h_sub_b1_item_content">FOR UNISEX</div>
                        <div class="h_sub_b1_item_img">
                            <img src="../public/images/hd_sub_arr1.png" alt="">
                        </div>
                    </div>
                </a>
            </div>



        </div>
    </div>