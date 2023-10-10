<!DOCTYPE html>

<h3 class="alert alert-success">TỔNG HỢP BÌNH LUẬN</h3>
<form action="index.php" method="POST">
    <table class="table">
        <thead class="alert alert-success">
            <tr>
                <th></th>
                <th>Mã bình luận</th>
                <th>Nội dung bình luận</th>
                <th>Sản phẩm</th>
                <th>Người bình luận</th>
                <th>Ngày bình luận</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listbl as $bl):
                    extract($bl);
            ?>
            <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td><?=$id?></td>
                <td><?=$noidung?></td>
                <td><?=sanpham_name($idpro)?></td>
                <td><?=taikhoan_name($iduser)?></td>
                <td><?=$ngaybinhluan?></td>
                <td><a href="index.php?act=xoabl&id=<?=$id?>" class="btn btn-outline-danger">Xóa</a></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</form>
<?php
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }else{
        echo '';
    }
?>