<h3 class="alert alert-success">THÊM KHÁCH HÀNG</h3>
<form action="index.php?act=addkh" class="mb-2" method="post" >
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">TÊN ĐĂNG NHẬP</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">MẬT KHẨU</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">EMAIL</label>
            <input type="email" name="email" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">ĐỊA CHỈ</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">SỐ ĐIỆN THOẠI</label>
            <input class="form-control" name="tel" type="text">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">CHỨC VỤ</label>
            <select class="form-select" name="role">
                <?php foreach ($listcv as $cv) : ?>
                    <option value="<?= $cv['id'] ?>"><?= $cv['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group mt-3">
        <button name="btn_addkh" class="btn btn btn-outline-dark">Thêm mới</button>
        <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
        <a href="index.php?act=listkh" class="btn btn btn-outline-dark">Danh sách</a>
    </div>
</form>
<?php
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }else{
        echo '';
    }
?>