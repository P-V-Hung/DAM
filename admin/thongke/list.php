<h3 class="alert alert-success">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h3>
<table class="table">
    <thead class="alert  alert-success">
        <tr>
            <th>STT</th>
            <th>LOẠI HÀNG</th>
            <th>SỐ LƯỢNG</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>TRUNG BÌNH</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $stt = 0;
            foreach($listtk as $tk):
                $stt++;
        ?>
            <tr>
                <td><?=$stt?></td>
                <td><?=$tk['namedm']?></td>
                <td><?=$tk['sosp']?></td>
                <td><?=$tk['max']?></td>
                <td><?=$tk['min']?></td>
                <td><?=$tk['trungbinh']?></td>
            </tr>
        <?php
            endforeach;
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a href="index.php?act=bieudotk" class="mt-3 btn btn-outline-dark">Xem biểu đồ</a>
            </td>
        </tr>
    </tfoot>
</table>