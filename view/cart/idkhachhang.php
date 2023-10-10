<form action="index.php?act=billcomfirm" method="post">
<div class="card">
    <div class="card-header">
        THÔNG TIN ĐẶT HÀNG
    </div>
    <table>
        <?php
            if(isset($_SESSION['user'])){
                $name = $_SESSION['user']['user'];
                $email = $_SESSION['user']['email'];
                $tel = $_SESSION['user']['tel'];
                $address = $_SESSION['user']['address'];
            }else{
                $name = '';
                $email = '';
                $tel = '';
                $address = '';
            }
        ?>
        <tbody>
            <tr>
                <td class="ps-4">Người đặt hàng</td>
                <td class="py-2 pe-4"><input type="text" class="form-control" name="user" value="<?=$name?>"></td>
            </tr>
            <tr>
                <td class="ps-4">Địa chỉ</td>
                <td class="py-2 pe-4"><input type="text" class="form-control" name="address" value="<?=$address?>"></td>
            </tr>
            <tr>
                <td class="ps-4">Email</td>
                <td class="py-2 pe-4"><input type="text" class="form-control" name="email" value="<?=$email?>"></td>
            </tr>
            <tr>
                <td class="ps-4">Điện thoại</td>
                <td class="py-2 pe-4"><input type="text" class="form-control" name="tel" value="<?=$tel?>"></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card my-5">
    <div class="card-header">
        PHƯƠNG THỨC THANH TOÁN
    </div>
    <div class="d-flex p-4 column">
        <div class="form-check col-4">
            <input class="form-check-input" value="1" type="radio" name="pttt" id="ttnh" checked>
            <label class="form-check-label" for="ttnh">
                Trả tiền khi nhận hàng
            </label>
        </div>
        <div class="form-check col-4">
            <input class="form-check-input" value="2" type="radio" name="pttt" id="ckng">
            <label class="form-check-label" for="ckng">
                Chuyển khoản ngân hàng
            </label>
        </div>
        <div class="form-check col-4">
            <input class="form-check-input" value="3" type="radio" name="pttt" id="ttol">
            <label class="form-check-label" for="ttol">
                Thanh toán online
            </label>
        </div>
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
<button class="btn btn-outline-dark mt-4" name="yesbill">Tiếp tục đặt hàng</button>
</form>