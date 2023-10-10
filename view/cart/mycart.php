<h3 class="alert alert-success">TỔNG HỢP BÌNH LUẬN</h3>
<table class="table">
    <thead class="alert alert-success">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Số lượng mặt hàng</th>
            <th>Tổng giá trị đơn hàng</th>
            <th>Tình trạng đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt=0;
        foreach ($listbill as $bill) :
            extract($bill);
            $listcart = query_bill_count($id);
        ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $ngaydathang ?></td>
                <td><?=$listcart[0]['soLuongSanPham']?></td>
                <td><?= $total ?></td>
                <td>
                    <?php
                        status_bill($bill_status);
                    ?>
                </td>
            </tr>
        <?php
        $stt++;
        endforeach;
        ?>
    </tbody>
</table>