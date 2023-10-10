<h3 class="alert alert-success">CẬP NHẬT TÀI KHOẢN</h3>
        <div class="row">
            <div class="col-sm-4">
                <img width="80%" src="https://tse1.mm.bing.net/th?id=OIP.PE61N2oEfKfqGkCXMX3HyAHaJ4&pid=Api&P=0&h=220" class="border img-fluid" alt="">
            </div>
            <div class="col-sm-8">
            <form class="mb-2" method="post" enctype="index.php?act=edit_tk">
                <div class="mb-3">
                    <label class="form-label fw-bold">Địa chỉ email</label>
                    <input type="email" name="email" class="form-control" value="<?=$_SESSION['user']['email']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tên đăng nhập</label>
                    <input type="text" name="user" class="form-control" value="<?=$_SESSION['user']['user']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Mật khẩu</label>
                    <input type="password" name="pass" class="form-control" value="<?=$_SESSION['user']['pass']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="<?=$_SESSION['user']['address']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Điện thoại</label>
                    <input type="text" name="tel" class="form-control" value="<?=$_SESSION['user']['tel']?>">
                </div>
                <input type="hidden" name="id" value="<?=$_SESSION['user']['id']?>">
                <button type="submit" name="btn_update" class="btn btn-outline-dark">Cập nhật</button>
                <input type="reset" value="Nhập lại" class="btn btn-outline-dark">
            </form>
            <?php
                if(isset($thongbao)&&($thongbao!="")){
                    echo $thongbao;
                }else{
                    echo "";
                }
            ?>
            </div>
        </div>