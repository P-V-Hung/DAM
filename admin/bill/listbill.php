<h3 class="alert alert-success">DANH SÁCH ĐƠN HÀNG</h3>
<form action="index.php?act=listbill" class="mb-3" method="POST">
    <div class="row">
    <div class="col-10">
            <input type="number" name="kyw" class="form-control" placeholder="Tìm kiếm theo mã đơn hàng">
        </div>
        <div class="col-2">
            <input type="submit" value="Lọc" class="btn btn-outline-dark form-control" name="btn_locbill">
        </div>
    </div>
</form>
<table class="table">
    <thead class="alert alert-success">
        <tr>
            <th></th>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Số lượng hàng</th>
            <th>Giá trị đơn hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listbill as $bill):
            extract($bill);
            $user = get_taikhoan($iduser);
            $listcart = query_bill_count($id);
        ?>
            <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td><?=$id?></td>
                <td>
                    <p>Tên: <?=$bill_name?></p>
                    <p>Email: <?=$bill_email?></p>
                    <p>Địa chỉ: <?=$bill_address?></p>
                    <p>SĐT: <?=$bill_tel?></p>
                </td>
                <td><?=$listcart[0]['soLuongSanPham']?></td>
                <td><?=$total?></td>
                <td><?=status_bill($bill_status)?></td>
                <td><a href="index.php?act=suabill&id=<?= $id?>" class="btn btn-outline-dark">Sửa</a> <a href="index.php?act=xoabill&id=<?= $id?>" class="btn btn-outline-dark">Xóa</a></td>
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
            </td>
        </tr>
    </tfoot>
</table>
<?php
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }else{
        echo '';
    }
?>