<?php
$css = array('list_products');
$js = array('list_products');
include('include/header.php');
include_once('../Controller/HomeController.php');
$product = new HomeController();
$products = $product->getAllProduct();
$categories = $product->getAllCate();

?>
<div class="main">
    <div class="main_title">
        <div class="main_link_title">
            <a href="#">Home</a>/<a href="#">Shop</a>
        </div>
    </div>
    <div class="main_container">
        <div class="container_box1">
            <img src="../public/images/list_banner.png" alt="">
        </div>
        <div class="container_box2">
            <div class="c_b2_find">
                <div class="b2_find_b1">
                    <div class="c2_find_title">
                        PRODUCTS CATEGORY
                    </div>
                    <div class="c2_find_content">
                        <div class="hidden c2_find_b1_item c2_find_b1_item_check c2_find_b1_item_hidden" value="0">
                        </div>
                        <?php if (mysqli_num_rows($categories) > 0) {
                            while ($category = mysqli_fetch_array($categories)) {
                        ?>
                        <div class="c2_find_b1_item search" value="<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                        </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
                <div class=" b2_find_b2">
                    <div class="c2_find_title">
                        FILTER BY PRICE
                    </div>
                    <div class="c2_find_content">
                        <div class="slider">
                            <div class="progress">
                            </div>
                            <div class="range_input">
                                <input type="range" class="range_min" min="0" max="1000" value="100" step="10">
                                <input type="range" class="range_max" min="0" max="1000" value="900" step="10">
                            </div>
                        </div>
                        <div class="find_price">
                            <div class="pricer_input">
                                <p>$</p><input type="number" class="ip_min" value="100">
                            </div>
                            <div class="separator">-</div>
                            <div class="pricer_input">
                                <p>$</p><input type="number" class="ip_max" value="900">
                            </div>
                            <div class="filter_price search" value="0">
                                Filter
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b2_find_b3">
                    <div class="c2_find_title">
                        COLOUR
                    </div>
                    <div class="c2_find_content">
                        <div class="b3_box_color">
                            <div class="hidden b3_item_color_check b3_item_color_hidden b3_item_color" value="0"></div>
                            <button class="b3_item_color item_color_white search" value="1">

                            </button>
                            <button class="b3_item_color item_color_black search" value="2">

                            </button>
                            <button class="b3_item_color item_color_red search" value="3">

                            </button>
                            <button class="b3_item_color item_color_yellow search" value="4">

                            </button>
                            <button class="b3_item_color item_color_blue search" value="5">

                            </button>
                        </div>
                    </div>
                </div>
                <div class="b2_find_b4">
                    <div class="c2_find_title">
                        SIZE
                    </div>
                    <div class="c2_find_content">
                        <div class="b4_box_size">
                            <div class="hidden b3_item_size_check b3_item_size_hidden b3_item_size" value="0"></div>
                            <button class="b3_item_size search" value="1">
                                S
                            </button>
                            <button class="b3_item_size search" value="2">
                                M
                            </button>
                            <button class="b3_item_size search" value="3">
                                l
                            </button>
                            <button class="b3_item_size search" value="4">
                                xl
                            </button>
                            <button class="b3_item_size search" value="5">
                                xxl
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c_b2_list">
                <div class="b2_list_sort">
                    <div class="list_sort_check">
                        <p class="list_sort_check_tittle">Defaut Sorting</p>
                        <img src="../public/images/arrow_sort.png">
                        <div class="list_sort_all hidden">
                            <div class="list_sort_post search list_sort_post_tick" value="0">Defaut Sorting</div>
                            <div class="list_sort_post search" value="1">Sort by price: low to high</div>
                            <div class="list_sort_post search" value="2">Sort by price: high to low</div>
                        </div>
                    </div>
                </div>
                <div class="b2_list_products">
                    <?php if (mysqli_num_rows($products) > 0) {
                        while ($product = mysqli_fetch_array($products)) {
                    ?>
                    <div class="m_box2_item">
                        <div class="m_b2_it_img">
                            <a href="/web_demo/view/detail_product.php?id=<?= $product['id'] ?>">
                                <img src="../<?= $product['img'] ?>">
                            </a>
                            <div class="m_b2_it_type">HOT</div>
                            <div class="m_b2_it_car">
                                <img src="../public/images/cart_item.png">
                            </div>
                        </div>
                        <a href="/web_demo/view/detail_product.php?id=<?= $product['id'] ?>">
                            <div class="m_b2_it_title"><?= $product['name'] ?></div>
                        </a>
                        <div class="m_b2_it_price"><?= $product['price'] ?> $</div>
                    </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>