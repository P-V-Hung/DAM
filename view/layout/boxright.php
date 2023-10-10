    <div class="card mt-2" style="width: 18rem; padding: 0">
        <?php
        if (isset($_SESSION['user'])) {
        ?>
            <div class="card-header">
                Xin chào: <?= $_SESSION['user']['user'] ?>
            </div>
            <ul class="my-3">
                <li><a href="index.php?act=quenmk" class="text-decoration-none">Quên mật khẩu</a></li>
                <li><a href="index.php?act=edit_tk" class="text-decoration-none">Cập nhật tài khoản</a></li>
                <?php 
                    if($_SESSION['user']['role']==1){
                ?>
                <li><a href="../admin/index.php" class="text-decoration-none">Đăng nhập admin</a></li>
                <?php
                    }
                ?>
                <li><a href="index.php?act=mycart" class="text-decoration-none">Đơn hàng của tôi</a></li>
                <li><a href="index.php?act=thoat" class="text-decoration-none">Thoát</a></li>
            </ul>
        <?php
        } else {
        ?>
            <div class="card-header">
                TÀI KHOẢN
            </div>
            <form class="px-3 py-3" action="index.php?act=dangnhap" method="POST">
                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control">
                    <div class="form-text"></div>
                </div>
                <div class="my-2">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="my-3 rounded form-check border border-2 py-1">
                    <input type="checkbox" name="checkbox" class="ms-0 form-check-input" checked>
                    <label class="form-check-label mx-2">Ghi nhớ tài khoản?</label>
                </div>
                <?php
                    if(isset($_SESSION['thongbao']))
                    {
                        echo $_SESSION['thongbao'];
                    }else{
                        echo "";
                    }
                    unset($_SESSION['thongbao']);
                ?>
                <button type="submit" name="btn_login" class="mt-1 mb-3 btn btn-outline-dark">Đăng nhập</button>
                <ul>
                    <li><a href="index.php?act=quenmk" class="text-decoration-none">Quên mật khẩu</a></li>
                    <li><a href="index.php?act=dangki" class="text-decoration-none">Đăng ký thành viên</a></li>
                </ul>
            </form>
        <?php
        }
        ?>
    </div>

    <div class="card my-4" style="width: 18rem;">
        <div class="card-header">
            DANH MỤC
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($listdm as $dm) : ?>
                <a href="index.php?act=danhmuc&iddm=<?= $dm['id'] ?>" class="list-group-item list-group-item-action"><?= $dm['name'] ?></a>
            <?php endforeach ?>
        </ul>
        <form class="card-footer d-flex" action="index.php?act=danhmuc" method="POST">
            <input type="search" name="title_search" placeholder="Từ khóa tìm kiếm" class="form-control">
        </form>
    </div>

    <div class="card mb-4" style="width: 18rem;">
        <div class="card-header">
            TOP 10 YÊU THÍCH
        </div>
        <ul class="list-group list-group-flush px-3 py-3">
            <?php
            foreach ($listspTop10 as $sp) :
            ?>
                <li class="list-unstyled">
                    <a href="index.php?act=ctsp&id=<?= $sp['id']?>" class="text-decoration-none my-1 d-block">
                        <img width="35px" height="35px" class="me-3 border border-dark rounded" src="../admin/image/<?= $sp['img'] ?>" alt="">
                        <span><?= $sp['name'] ?></span>
                    </a>
                </li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>