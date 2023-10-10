<h3 class="alert alert-success">DANH SÁCH TÀI KHOẢN</h3>
<table class="table">
    <thead class="alert alert-success">
        <tr>
            <th></th>
            <th>Mã tài khoản</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Chức vụ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listtk as $tk) :
        ?>
            <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td><?=$tk['id']?></td>
                <td><?=$tk['user']?></td>
                <td><?=$tk['pass']?></td>
                <td><?=$tk['email']?></td>
                <td><?=$tk['address']?></td>
                <td><?=$tk['tel']?></td>
                <td>
                    <?=check_vitri($tk['role'])?>
                </td>
                <td><a href="index.php?act=suakh&id=<?= $tk['id']?>" class="btn btn-outline-dark">Sửa</a> <a href="index.php?act=xoakh&id=<?= $tk['id']?>" class="btn btn-outline-dark">Xóa</a></td>
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
                <a href="index.php?act=addkh" class="btn btn-outline-dark">Nhập thêm</a>
            </td>
        </tr>
    </tfoot>
</table>
<?php
if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
}
?>