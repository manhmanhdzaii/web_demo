<?php
include_once('../include/header.php');
include_once('../../../Controller/ProductController.php');
$product = new ProductController();
$products = $product->getAll();

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
    <h1 class="h3 mb-0 text-gray-800">Danh sách danh mục sản phẩm</h1>
</div>

<p><a href="/web_demo/view/admin/product/add.php" class="btn btn-primary">Thêm mới</a></p>
<?php if (isset($_COOKIE['success'])) { ?>
<div class="alert alert-success">
    <?= $_COOKIE['success'] ?>
</div>
<?php } ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên sp</th>
            <th>Giá sp</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($products) > 0) {
            while ($product = mysqli_fetch_array($products)) {
        ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= number_format($product['price']) ?> $</td>
            <td class="text-center"><img src='../../../<?= $product['img'] ?>' width='100px'></td>
            <td><?= $product['c_name'] ?></td>
            <td>
                <a href='' class="btn btn-warning">Sửa</a>
            </td>
            <td>
                <a href="/web_demo/view/admin/product/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger"
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