<?php
$css = array('detail_product');
$js = array('detail_product');
if (isset($_GET['id'])) {
    include_once('../Controller/HomeController.php');
    $product = new HomeController();
    $result = $product->check_id($_GET['id']);
    if ($result) {
        $detail = $product->getOne($_GET['id']);
        $sub_img = $product->get_img($_GET['id']);
        $product = mysqli_fetch_assoc($detail);
    } else {
        header('Location: list_products.php');
    }
} else {
    header('Location: list_products.php');
}
include('include/header.php');
?>
<div class="main">
    <div class="main_title">
        <div class="main_link_title">
            <a href="#">Home</a> / <a href="#">Shop</a> / <a href="#"><?= $product['name'] ?></a>
        </div>
    </div>
    <div class="main_container">
        <div class="main_img">
            <div class="main_img_demo">
                <?php if (mysqli_num_rows($sub_img) > 0) {
                    while ($img = mysqli_fetch_array($sub_img)) {
                ?>
                <div class="item_img_demo">
                    <img src="../<?= $img['path'] ?>">
                </div>
                <?php }
                } ?>
            </div>
            <div class="main_img_show">
                <img src="../<?= $product['img'] ?>">
            </div>
        </div>
        <div class="main_content">
            <div class="content_title">
                <p><?= $product['name'] ?></p>
                <p class="title_type">HOT</p>
            </div>
            <div class="content_price">
                $ <?= $product['price'] ?>
            </div>
            <div class="content_text">
                Get this: you can look good while being environmentally conscious. The women's premium organic
                t-shirt is made up of 100% organic cotton, making it crew and comfy. Plus, the shirt promises the
                best-possible print results, making it an excellent choice for those looking to customize.
            </div>
            <form class="content_add_cart" method="post" action="/web_demo/Ajax/add_cart.php">
                <div class="add_cart_subtraction">-</div>
                <input type="number" class="add_cart_value" value="1" name="add_cart_value">
                <div class="add_cart_summation">+</div>
                <button type="submit" class="add_cart_to">ADD TO CART</button>
                <input type="hidden" value="<?= $product['id'] ?>" name="product_id">
            </form>
            <div class="content_des">
                <div class="content_des_title">
                    <p>Description</p><img src="../public/images/detai_it_title.png" alt="">
                </div>
                <div class="content_des_content">
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>Woman 3-piece dress suits: 100% organic cotton</p>
                    </div>
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>Dry clean only</p>
                    </div>
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>This product contains (suit, vest and pants)</p>
                    </div>
                </div>
            </div>
            <div class="content_des">
                <div class="content_des_title">
                    <p>Additional Information</p><img src="../public/images/detai_it_title.png" alt="">
                </div>
                <div class="content_des_content">
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>Category: Women, clothing, white, yellow, red, black,</p>
                    </div>
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>Size: S, M, L, XL, XXL</p>
                    </div>
                </div>
            </div>
            <div class="content_des">
                <div class="content_des_title">
                    <p>Shipping and Returns</p><img src="../public/images/detai_it_title.png" alt="">
                </div>
                <div class="content_des_content">
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>Delivery in 5-7 days</p>
                    </div>
                    <div class="ct_des_item">
                        <img src="../public/images/item_img.png" alt="">
                        <p>Free shipping (New York area only)</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
<?php
include('include/footer.php');
?>