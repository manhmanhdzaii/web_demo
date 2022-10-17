<?php
include_once('../include/header.php');
include_once('../../../Controller/CartController.php');
$cart = new CartController();
$orders = $cart->getAll();

?>
<form class="form_list_search" action="" method="get">
    <div class="input-group">
        <input type="text" class="form-control small" placeholder="Tìm kiếm..." aria-label="Search"
            aria-describedby="basic-addon2" name="name">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách đơn hàng</h1>
</div>

<p><a href="/web_demo/view/admin/product/add.php" class="btn btn-primary">Thêm mới</a></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ngày đặt hàng</th>
            <th width="5%">Xem</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($orders) > 0) {
            while ($order = mysqli_fetch_array($orders)) {
        ?>
        <tr>
            <td><?= $order['cus_name'] ?></td>
            <td><?= $order['cus_phone'] ?></td>
            <td><?= $order['cus_email'] ?></td>
            <td><?= date('Y-m-d H:i:s', $order['created_at']) ?></td>
            <td>
                <a href="/web_demo/view/admin/order/view.php?id=<?= $order['id'] ?>" class="btn btn-warning">Xem</a>
            </td>
            <td>
                <a href="/web_demo/view/admin/order/delete.php?id=<?= $order['id'] ?>" class="btn btn-danger"
                    onclick="return confirm('Bạn có chắc chắn xóa ?')">Xóa</a>
            </td>
        </tr>
        <?php
            }
        } ?>
    </tbody>
</table>

<?php
include_once('../include/footer.php');
?>