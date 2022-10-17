<?php
$css = array('checkout');
$js = array('jquery.validate.min', 'checkout');
include('include/header.php');
include_once('../Controller/HomeController.php');
$product = new HomeController();
if (!empty($_SESSION['carts'])) {
    $arr = array_keys($_SESSION['carts']);
    $arr = implode(', ', $arr);
    $item_cart = $product->getCart($arr);
}
?>
<div class="main">
    <div class="main_title">
        <div class="main_link_title">
            <a href="#">Home</a>/<a href="#">Cart</a>
        </div>
    </div>
    <div class="main_container">
        <div class="container_box1">
            <img src="../public/images/imgcheckout.png" alt="">
        </div>
        <form class="container_box2" onsubmit="return false;" id="checkout">
            <div class="box2_left">
                <div class="box2_left_box1">
                    <div class="box2_title">
                        <img src="../public/images/line_title.png" alt="">
                        <p>YOUR INFORMATION</p>
                    </div>
                    <div class="box_input_container">
                        <div class="box_input">
                            <p>Name</p>
                            <input type="text" name="name" placeholder="Nhập tên..">
                            <p class="err"></p>
                        </div>
                        <div class="box_input">
                            <p>Phone Number</p>
                            <input type="text" name="phone" placeholder="Nhập số điện thoại...">
                            <p class="err"></p>
                        </div>
                    </div>
                    <div class="box_input_container">
                        <div class="box_input">
                            <p>Email</p>
                            <input type="text" placeholder="Nhập email.." name="email">
                            <p class="err"></p>
                        </div>
                    </div>
                    <div class="box_input_container">
                        <div class="box_input">
                            <p>City</p>
                            <input type="text" name="city" placeholder="Nhập địa chỉ..">
                            <p class="err"></p>
                        </div>
                        <div class="box_select">
                            <p>Zip Code</p>
                            <select>
                                <option value="">Home</option>
                                <option value="">Office</option>
                            </select>
                        </div>
                    </div>
                    <div class="box_checkbox_container">
                        <div class="box_checkbox">
                            <input type="radio" name="check_time">
                            <p>Office hours only</p>
                        </div>
                        <div class="box_checkbox">
                            <input type="radio" name="check_time">
                            <p>Every day of the week (matches home address)</p>
                        </div>
                    </div>
                    <div class="box_input_container">
                        <div class="box_input">
                            <p>Note</p>
                            <textarea placeholder="Type something here..." name="note"></textarea>
                            <p class="err"></p>
                        </div>
                    </div>
                </div>
                <div class="box2_left_box2">
                    <div class="box2_title">
                        <img src="../public/images/line_title.png" alt="">
                        <p>PAYMENT INFORMATION</p>
                    </div>
                    <div class="select_pay">
                        <select>
                            <option value="">Payment by cash when received</option>
                            <option value="">Online</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box2_right">
                <div class="box2_title">
                    <img src="../public/images/line_title.png" alt="">
                    <p>YOUR ORDER</p>
                </div>

                <div class="box2_right_title">
                    Products
                </div>
                <div class="all_product">
                    <?php if (!empty($_SESSION['carts'])) {
                        if (mysqli_num_rows($item_cart) > 0) {
                            $total = 0;
                            while ($item = mysqli_fetch_array($item_cart)) {
                    ?>
                    <div class="detail_product">
                        <a href="/web_demo/view/detail_product.php?id=<?= $item['id'] ?>">
                            <img src="../<?= $item['img'] ?>" alt="">
                        </a>
                        <div class="product_content">
                            <a href="/web_demo/view/detail_product.php?id=<?= $item['id'] ?>">
                                <div class="product_name">
                                    <?= $item['name'] ?> x<?= $_SESSION['carts'][$item['id']] ?>
                                </div>
                            </a>
                            <div class="product_price">
                                <?php $price_item = $_SESSION['carts'][$item['id']] * $item['price'];
                                            $total += $price_item;
                                            ?>
                                $ <?= $price_item ?>
                            </div>

                        </div>
                    </div>
                    <?php }
                        }
                    }
                    ?>
                </div>
                <div class=" box2_right_title">
                    Order summary
                </div>
                <div class="price_all">
                    <div class="price">
                        <p>Subtotal</p>
                        <p class="price_secon"><?= $total ?> $</p>
                    </div>
                    <div class="price">
                        <p>Shipping</p>
                        <p class="price_ship">0 $</p>
                    </div>
                </div>
                <div class="price_total">
                    <p>TOTAL</p>
                    <p class="price_after"><?= $total ?> $</p>
                </div>
                <button class="button_buy" type="submit">
                    CONFIRM ORDER
                </button>
            </div>

        </form>
    </div>
    <div class="popup__all hidden">
        <div class="main__popup">
            <img src="../public/images/img_logo_send.png" alt="">
            <div class="main__popup_title">
                THANK YOU!
            </div>
            <div class="main__popup_content">
                Thanks for your ordering. Your order is being confirmed and will be delivered as soon as possible.
                Don't forget to keep an eye on your phone and email to receive the latest information from us.
                Best regards!
            </div>
            <a href="/web_demo/view">
                <button class="buttonback">
                    BACK TO HOMEPAGE
                </button>
            </a>
        </div>

    </div>
    <?php
    include('include/footer.php');
    ?>