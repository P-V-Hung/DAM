<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>
<form action="index.php" method="POST">
    <table class="table border border-2">
        <thead class="alert alert-success">
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($listdm) && !empty($listdm)){
                    foreach ($listdm as $list): 
            ?>
                <?php extract($list) ?>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td><?=$id?></td>
                    <td><?=$name?></td>
                    <td><a href="index.php?act=suadm&id=<?=$id?>" class="btn btn-outline-dark">Sửa</a> <a href="index.php?act=xoadm&id=<?=$id?>" onclick="return confirm('Xóa danh mục này đồng nghĩa với xóa tất cả sản phẩm ở danh mục này. Bạn có đồng ý không?')" class="btn btn-outline-dark">Xóa</a></td>
                </tr>
            <?php
                    endforeach;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <button type="button" class="btn btn-outline-dark">Chọn tất cả</button>
                    <button type="button" class="btn btn-outline-dark">Bỏ chọn tất cả</button>
                    <button name="btn-delete" class="btn btn-outline-dark">Xóa các mục chọn</button>
                    <a href="index.php?act=adddm" class="btn btn-outline-dark">Nhập thêm</a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<?php
    if(isset($thongbao) && ($thongbao != "")){
        echo $thongbao;
    }
?>