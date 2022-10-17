<?php


if (isset($_GET['id'])) {
    include_once('../../../Controller/CartController.php');
    $cart = new CartController();
    $result = $cart->check_id($_GET['id']);
    if ($result) {
    } else {
        header('Location: list.php');
    }
} else {
    header('Location: list.php');
}
include_once('../include/header.php');
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Chi tiết đơn hàng</h1>
</div>

<!-- <p><a href="/web_demo/view/admin/product/add.php" class="btn btn-primary">Thêm mới</a></p> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php if (mysqli_num_rows($result) > 0) {

            while ($order = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?= $order['pd_name'] ?></td>
            <td><?= $order['price'] ?> $</td>
            <td><?= $order['amount'] ?></td>
            <?php
                    $price = $order['price'] * $order['amount'];
                    $total += $price;
                    ?>
            <td><?= $price ?> $</td>
        </tr>
        <?php
            }
        } ?>
        <tr>
            <td colspan="3">Tổng thanh toán</td>
            <td colspan="3"><?= $total ?> $</td>
        </tr>
    </tbody>
</table>

<?php
include_once('../include/footer.php');
?>