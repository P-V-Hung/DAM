<h3 class="alert alert-success">THÊM MỚI SẢN PHẨM</h3>
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label fw-bold">MÃ SẢN PHẨM</label>
                    <input class="form-control" name="id" type="text" value="auto number" disabled>
                </div>
                <div class="mb-3 col">
                    <label class="form-label fw-bold">TÊN SẢN PHẨM</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3 col">
                    <label class="form-label fw-bold">ĐƠN GIÁ</label>
                    <input type="number" name="price" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label fw-bold">HÌNH ẢNH</label>
                    <input type="file" name="hinh" class="form-control">
                </div>
                <div class="mb-3 col">
                    <label class="form-label fw-bold">SỐ LƯỢT XEM</label>
                    <input class="form-control" name="luotxem" type="text" value="0" readonly>
                </div>
                <div class="mb-3 col">
                    <label class="form-label fw-bold">LOẠI HÀNG</label>
                    <select class="form-select" name="loaihang">
                        <?php foreach($listdm as $dm): ?>
                        <option value="<?=$dm['id']?>"><?=$dm['name']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row px-2">
                <label class="form-label fw-bold">MÔ TẢ</label>
                <textarea name="mota" class="border border-2 rounded" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group mt-3">
                <button name="btn_addsp" class="btn btn btn-outline-dark">Thêm mới</button>
                <button type="reset" class="btn btn btn-outline-dark">Nhập lại</button>
                <a href="index.php?act=listsp" class="btn btn btn-outline-dark">Danh sách</a>
            </div>
        </form>
        <?php
    if(isset($thongbao) && ($thongbao != "")){
        echo $thongbao;
    }
?>