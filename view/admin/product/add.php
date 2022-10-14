<?php
$ckeditor = true;
include_once('../include/header.php');

include_once('../../../Controller/ProductController.php');
$product = new ProductController();
$categories = $product->getCategories();
$sizes = $product->getSizes();
$colors = $product->getColors();
if (isset($_POST['name'])) {
    $result = $product->insert_product();
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
</div>

<form action="" method="post" enctype="multipart/form-data" id="f_add_product">
    <div class="mb-3-vali">
        <label for="">Tên sản phẩm</label>
        <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm...." value="">
    </div>
    <p class="err"></p>
    <div class="mb-3-vali">
        <label for="">Giá sản phẩm ($)</label>
        <input name="price" type="number" class="form-control" placeholder="Nhập giá sản phẩm...." value="">
    </div>
    <p class="err"></p>
    <div class="mb-3-vali">
        <label for="">Màu sản phẩm</label>
        <select name="color_id[]" id="color_id" class="form-control" multiple>
            <?php
            if (mysqli_num_rows($colors) > 0) {
                while ($color = mysqli_fetch_array($colors)) { ?>
            <option value="<?= $color['id'] ?>"><?= $color['name'] ?></option>

            <?php }
            }
            ?>
        </select>
    </div>
    <p class="err"></p>
    <div class="mb-3-vali">
        <label for="">Size sản phẩm</label>
        <select name="size_id[]" id="size_id" class="form-control" multiple>
            <?php
            if (mysqli_num_rows($sizes) > 0) {
                while ($size = mysqli_fetch_array($sizes)) { ?>
            <option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>

            <?php }
            }
            ?>
        </select>
    </div>
    <p class="err"></p>
    <div class="mb-3-vali">
        <label for="">Danh mục</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Chọn danh mục</option>
            <?php
            if (mysqli_num_rows($categories) > 0) {
                while ($category = mysqli_fetch_array($categories)) { ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

            <?php }
            }
            ?>
        </select>
    </div>
    <p class="err"></p>
    <div class="mb-3-vali">
        <label for="">Hình ảnh sản phẩm</label>
        <div class="custom-file">
            <input type="file" class="form-control" id="img" name="img" onchange="loadFile1(event,this);">
            <label class="custom-file-label" for="img">Choose file</label>
        </div>
        <p class="err"></p>
    </div>

    <div class="mb-3-vali">
        <div class="img_prew">
        </div>
    </div>
    <div class="mb-3-vali">
        <label for="">Hình ảnh kèm theo(tối đa 4)</label>
        <div class="custom-file">
            <input type="file" class="form-control" id="img_sub" name="img_sub[]" onchange="loadFile(event,this);"
                multiple>
            <label class="custom-file-label" for="img_sub">Choose file</label>
        </div>
        <p class="err"></p>
    </div>
    <div class="mb-3-vali">
        <div class="img_prew_sub">
        </div>
    </div>
    <div class="mb-3">
        <label for="">Mô tả chi tiết</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <p class="err"></p>
    <button class="btn btn-primary" type="submit">Thêm mới</button>
</form>

<?php
include_once('../include/footer.php');
?>