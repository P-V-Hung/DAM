<div class="card mb-4">
    <div class="card-header">
        CẢM ƠN QUÝ KHÁCH
    </div>
    <div class="p-4">
        <h5 class="text-center">Cảm ơn quý khách đã đặt hàng</h5>
    </div>
</div>
<?php
if (isset($bill)) {
    extract($bill);
}
?>
<div class="card mb-4">
    <div class="card-header">
        THÔNG TIN ĐƠN HÀNG
    </div>
    <table>
        <tbody>
            <tr>
                <td class="ps-4">Mã đơn hàng</td>
                <td class="py-2 pe-4">
                    <p><?= $id ?></p>
                </td>
            </tr>
            <tr>
                <td class="ps-4">Ngày đặt hàng</td>
                <td class="py-2 pe-4">
                    <p><?= $ngaydathang ?></p>
                </td>
            </tr>
            <tr>
                <td class="ps-4">Tổng đơn hàng</td>
                <td class="py-2 pe-4">
                    <p><?= $total ?></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card mb-4">
    <div class="card-header">
        THÔNG TIN ĐẶT HÀNG
    </div>
    <table>
        <tbody>
            <tr>
                <td class="ps-4">Người đặt hàng</td>
                <td class="py-2 pe-4">
                    <p><?= $bill_name ?></p>
                </td>
            </tr>
            <tr>
                <td class="ps-4">Địa chỉ</td>
                <td class="py-2 pe-4">
                    <p><?= $bill_address ?></p>
                </td>
            </tr>
            <tr>
                <td class="ps-4">Email</td>
                <td class="py-2 pe-4">
                    <p><?= $bill_email ?></p>
                </td>
            </tr>
            <tr>
                <td class="ps-4">Điện thoại</td>
                <td class="py-2 pe-4">
                    <p><?= $bill_tel ?></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card mb-4">
    <div class="card-header">
        PHƯƠNG THỨC THANH TOÁN
    </div>
    <div class="p-4">
        <h5 class="text-center">
            <?php
            switch ($pttt) {
                case 1:
                    echo 'Thanh toán khi nhận hàng';
                    break;
                case 2:
                    echo 'Chuyển khoản thanh toán';
                    break;
                case 3:
                    echo 'Thanh toán online';
                    break;
            }
            ?>
        </h5>
    </div>
</div>

<div class="card">
    <div class="card-header">
        THÔNG TIN GIỎ HÀNG
    </div>
    <div class="p-4">
        <?php
        viewcart('hiden');
        ?>
    </div>
</div>
<?php
    unset($_SESSION['mycart']);
?>