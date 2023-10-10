<h3 class="alert alert-success">SỬA THÔNG TIN KHÁCH HÀNG</h3>
<form action="index.php?act=editkh" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">TÊN ĐĂNG NHẬP</label>
            <input type="text" name="username" class="form-control" value="<?=$tk['user']?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">MẬT KHẨU</label>
            <input type="password" name="password" class="form-control" value="<?=$tk['pass']?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">EMAIL</label>
            <input type="email" name="email" class="form-control" value="<?=$tk['email']?>">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">ĐỊA CHỈ</label>
            <input type="text" name="address" class="form-control" value="<?=$tk['address']?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">SỐ ĐIỆN THOẠI</label>
            <input class="form-control" name="tel" type="text" value="<?=$tk['tel']?>">
        </div>
        <div class="mb-3 col">
            <label class="form-label fw-bold">CHỨC VỤ</label>
            <select class="form-select" name="role">
                <?php foreach($listcv as $cv): ?>
                <option <?php ($cv['id']==$tk['role'])?'selected':'' ?> value="<?=$cv['id']?>"><?=$cv['name']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="hidden" name="id" value="<?=$tk['id']?>">
        <button name="btn_updatekh" class="btn btn btn-outline-dark">Sửa sản phẩm</button>
        <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
        <a href="index.php?act=listkh" class="btn btn btn-outline-dark">Danh sách</a>
    </div>
</form>