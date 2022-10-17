<?php
$css = array('cart');
$js = array('cart');

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
    <form class="main_container" action="/web_demo/Ajax/update_cart.php" method="get">
        <div class="container_box1">
            <img src="../public/images/imgcart.png" alt="">
        </div>
        <?php
        if (isset($_COOKIE['update_cart'])) {
        ?>
        <h1 style="text-align: center; font-size: 40px"><?= $_COOKIE['update_cart'] ?></h1>
        <?php
        }
        ?>
        <div class="container_box2">
            <?php if (!empty($_SESSION['carts'])) { ?>
            <div class="table_cart">
                <table>
                    <tr>
                        <td width="6%">

                        </td>
                        <td width="54%">
                            Product
                        </td>
                        <td width="20%">
                            Quantity
                        </td>
                        <td width="20%">
                            Subtotal
                        </td>
                    </tr>
                    <?php if (mysqli_num_rows($item_cart) > 0) {
                            $total = 0;
                            while ($item = mysqli_fetch_array($item_cart)) {
                        ?>
                    <tr>
                        <td>
                            <div class="img_delete">
                                <img src="../public/images/delete_cart.png" alt="">
                            </div>
                        </td>
                        <td class="product">
                            <a href="/web_demo/view/detail_product.php?id=<?= $item['id'] ?>">
                                <img src="../<?= $item['img'] ?>" alt="">
                            </a>
                            <div class="detail_product">
                                <a href="/web_demo/view/detail_product.php?id=<?= $item['id'] ?>">
                                    <p class="name_product">
                                        <?= $item['name'] ?>
                                    </p>
                                </a>
                                <p class="price_product">
                                    $ <?= $item['price'] ?>
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="amount_product">
                                <div class="count_minus">
                                    -
                                </div>
                                <input type="number" value="<?php echo $_SESSION['carts'][$item['id']] ?>"
                                    name="product[<?= $item['id'] ?>]">
                                <div class="count_add">
                                    +
                                </div>
                            </div>
                        </td>
                        <td class="price_total_product">
                            <?php $price_item = $_SESSION['carts'][$item['id']] * $item['price'];
                                        $total += $price_item;
                                        ?>
                            $ <?= $price_item ?>
                        </td>
                    </tr>
                    <?php }
                        } ?>
                    <tr class="tr_total">
                        <td></td>
                        <td colspan="2" class="text_total">It is our pleasure to serve you!</td>
                        <td>
                            <div class="total_all">
                                <?php echo number_format($total) ?> $
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="handle">
                <button class="button_update" type="submit" onclick='return alert("Update giỏ hàng thành công");'>
                    UPDATE CART
                </button>
                <a href="<?php echo count($_SESSION['carts']) > 0 ? "/web_demo/view/checkout.php" : "#" ?>"><button
                        class="button_checkout" type="button">
                        PROCESS TO CHECK OUT
                    </button></a>
            </div>
            <?php } else { ?>
            <h1 style="text-align: center; font-size: 40px">Không có sản phẩm nào trong giỏ hàng</h1>
            <?php } ?>
        </div>

    </form>
</div>
<?php
include('include/footer.php');

?>