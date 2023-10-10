<h3 class="alert alert-success">CẬP NHẬT TÌNH TRẠNG ĐƠN HÀNG</h3>
<form action="index.php?act=suabill" method="post" >
    <div class="row">
        <div class="mb-3 col">
            <label class="form-label fw-bold">Tình trạng đơn hàng</label>
            <select class="form-select" name="ttbill">
                <option value="0">Chờ xác nhận</option>
                <option value="1">Đang xử lý</option>
                <option value="2">Đang giao hàng</option>
                <option value="3">Đã giao hàng</option>
            </select>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="hidden" name="id" value="<?=$_GET['id']?>" >
        <button name="btn_updatebill" class="btn btn btn-outline-dark">Sửa sản phẩm</button>
        <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
        <a href="index.php?act=listbill" class="btn btn btn-outline-dark">Danh sách</a>
    </div>
</form>