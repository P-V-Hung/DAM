<h3 class="alert alert-success">ĐĂNG KÝ THÀNH VIÊN</h3>
        <form enctype="index.php?act=dangki" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tên đăng nhập</label>
                <input type="text" name="user" class="form-control">
                <div class="form-text"></div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Mật khẩu</label>
                <input type="password" name="pass" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Địa chỉ email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Địa chỉ</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Số điện thoại</label>
                <input type="text" name="tel" class="form-control">
            </div>
            <button type="submit" name="btn_logup" class="btn btn-outline-dark">Đăng ký</button>
        </form>
        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }else{
                echo "";
            }
        ?>