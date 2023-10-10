<?php
function viewcart($hiden = 'view')
{
    $tong = 0;
    $stt = 0;
    if ($hiden == 'hiden') {
        $th = '';
        $td = '';
        $tb = '';
    } else {
        $th = '<th></th>';
        $td = '<td><a href="index.php?act=xoacart&idcart=' . $stt . '" class="btn btn-outline-dark">Xóa</a></td>';
        $tb = '<td></td>';
    }
?>
    <table class="table">
        <thead class="alert alert-success">
            <tr class="text-center">
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <?= $th ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['mycart'] as $cart) :
                $tong += $cart[5];
            ?>
                <tr class="text-center">
                    <td><?= $stt ?></td>
                    <td><?= $cart[1] ?></td>
                    <td><img width="75px" src="../admin/image/<?= $cart[2] ?>" alt=""></td>
                    <td><?= $cart[3] ?></td>
                    <td><?= $cart[4] ?></td>
                    <td><?= $cart[5] ?></td>
                    <?= $td ?>
                </tr>
            <?php
                $stt++;
            endforeach;
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="fs-5">Tổng tiền là: </td>
                <td class="text-danger fs-5 fw-bold"><?= $tong ?></td>
                <?= $tb ?>
            </tr>
        </tbody>

    </table>
<?php
}

function tongdonhang($tong = 0)
{
    foreach ($_SESSION['mycart'] as $cart) :
        $tong += $cart[5];
    endforeach;
    return $tong;
}

function insert_bill($name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang,$iduser){
    $sql = "INSERT INTO `bill` (`bill_name`,`bill_address`,`bill_tel`,`bill_email`,`bill_pttt`,`ngaydathang`,`total`,`iduser`) VALUES ('$name','$address','$tel','$email','$pttt','$ngaydathang','$tongdonhang','$iduser')";
    return pdo_execute_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql = "INSERT INTO `cart` (`iduser`,`idpro`,`img`,`name`,`price`,`soluong`,`thanhtien`,`idbill`) VALUES ('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function delete_bill($id){
    $sql = " DELETE FROM cart WHERE idbill = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM bill WHERE id = $id";
    return pdo_execute($sql);
}

function get_bill($id){
    $sql = "SELECT * FROM `bill` WHERE id=$id";
    return pdo_query_one($sql);
}
function list_bill(){
    $sql = "SELECT * FROM `bill`";
    return pdo_query($sql);
}
function query_bill($kyc=0,$iduser=0){
    $sql = "SELECT * FROM `bill` WHERE 1";
    if($iduser!=0){
        $sql.=" AND `iduser` = $iduser";
    }
    if($kyc!=0){
        $sql.= " AND `id` = $kyc";
    }
    $sql.=" ORDER BY `id` DESC";
    return pdo_query($sql);
}
function update_bill($id,$ttdh){
    $sql = "UPDATE `bill` SET `bill_status` = '$ttdh' WHERE `bill`.`id` = $id";
    pdo_execute($sql);
}
function query_bill_count($idbill){
    $sql = "SELECT COUNT(*) AS soLuongSanPham FROM cart WHERE idbill = $idbill;";
    return pdo_query($sql);
}

function status_bill($bill_status){
    switch($bill_status){
        case 0:
            echo 'Chờ xác nhận';
            break;
        case 1:
            echo 'Đang xử lý';
            break;
        case 2:
            echo 'Đang giao hàng';
            break;
        case 3:
            echo 'Đã giao hàng';
            break;
        default:
            echo 'Xảy ra lỗi';
    } 
}

function list_thongke(){
    $sql = "SELECT d.name as namedm,COUNT(s.id_dm) as sosp,max(s.price) as max,min(s.price) as min, avg(s.price) as trungbinh FROM `danhmuc` d LEFT JOIN `sanpham` s ON d.id=s.id_dm group by d.id order by d.id desc";
    return pdo_query($sql);
}