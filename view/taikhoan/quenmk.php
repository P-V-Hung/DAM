<h3 class="alert alert-success">ĐỔI MẬT KHẨU</h3>
        <form enctype="index.php?act=quenmk" class="mb-3" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Địa chỉ email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <button type="submit" name="btn_search" class="btn btn-outline-dark">Tìm lại mật khẩu</button>
        </form>
        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }else{
                echo '';
            }
        ?>