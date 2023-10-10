<h3 class="alert alert-success">THÊM MỚI DANH MỤC</h3>
<form action="index.php?act=adddm" method="POST">
    <div class="form-group mb-3">
        <label class="form-label fw-bold">Mã loại</label>
        <input type="text" name="ma_loai" class="form-control" value="auto number" disabled>
        <div class="form-text"></div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label fw-bold">Tên loại</label>
        <input type="text" name="ten_loai" class="form-control">
    </div>
    <div class="form-group">
        <button name="btn_adddm" class="btn btn btn-outline-dark">Thêm mới</button>
        <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
        <a href="index.php?act=listdm" class="btn btn btn-outline-dark">Danh sách</a>
    </div>
</form>
<?php
    if(isset($thongbao) && ($thongbao != "")){
        echo $thongbao;
    }
?>