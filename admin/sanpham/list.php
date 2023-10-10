<h3 class="alert alert-success">QUẢN LÝ SẢN PHẨM</h3>
<form action="index.php?act=listsp" class="mb-3" method="POST">
    <div class="row">
    <div class="col-10">
            <select name="danhmuc" class="form-select">
                <option value="0" selected>Tất cả</option>
                <?php foreach ($listdm as $dm) : ?>
                    <option value="<?= $dm['id'] ?>"><?= $dm['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-2">
            <input type="submit" value="Lọc" class="btn btn-outline-dark form-control" name="btn_locsp">
        </div>
    </div>
</form>
<table class="table">
    <thead class="alert alert-success">
        <tr>
            <th></th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Hình ảnh</th>
            <th>Lượt xem</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($listsp as $sp) :
                extract($sp);
        ?>
            <tr class="">
                <td><input class="form-check-input" type="checkbox"></td>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td><?= $price ?></td>
                <td><img width="75px" class="border border-dark-1" src="image/<?= $img ?>" alt=""></td>
                <td><?= $luotxem ?></td>
                <td><a href="index.php?act=suasp&id=<?= $id ?>" class="btn btn-outline-dark">Sửa</a> <a href="index.php?act=xoasp&id=<?= $id ?>" class="btn btn-outline-dark">Xóa</a></td>
            </tr>
        <?php 
            endforeach;
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">
                <button type="button" class="btn btn-outline-dark">Chọn tất cả</button>
                <button type="button" class="btn btn-outline-dark">Bỏ chọn tất cả</button>
                <button name="btn-delete" class="btn btn-outline-dark">Xóa các mục chọn</button>
                <a href="index.php?act=addsp" class="btn btn-outline-dark">Nhập thêm</a>
            </td>
        </tr>
    </tfoot>
</table>
<?php
if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
}
?>