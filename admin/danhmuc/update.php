<h3 class="alert alert-success">CẬP NHẬT DANH MỤC</h3>
<form action="index.php?act=updatedm" method="POST">
    <div class="form-group mb-3">
        <label class="form-label fw-bold">Mã loại</label>
        <input type="text" name="ma_loai" class="form-control" value="<?=$dm['id']?>" disabled>
        <div class="form-text"></div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label fw-bold">Tên loại</label>
        <input type="text" name="ten_loai" class="form-control" value="<?=$dm['name']?>">
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?=$dm['id']?>">
        <button name="btn_updatedm" class="btn btn btn-outline-dark">Sửa danh mục</button>
        <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
        <a href="index.php?act=listdm" class="btn btn btn-outline-dark">Danh sách</a>
    </div>
</form>