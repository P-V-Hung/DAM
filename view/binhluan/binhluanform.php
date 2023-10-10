<?php
    session_start();
    require "../../model/pdo.php";
    require "../../model/binhluan.php";
    require "../../model/taikhoan.php";
    $idpro = $_REQUEST['idpro']; 
    if(isset($_POST['btn_bl'])){
        $iduser = $_SESSION['user']['id'];
        $noidung = $_POST['textbl'];
        $idpro = $_POST['idpro'];
        $ngaybinhluan = date('h:i:sa d/m/Y');
        insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
        $severRefe = $_SERVER['HTTP_REFERER'];
        header("Location: $severRefe");
    }
    $listbl = list_binhluan($idpro);
    ?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card my-4">
        <div class="card-header">
            BÌNH LUẬN 
        </div>
        <table class="ms-5 my-2">    
            <tr border="1">
            <?php
                foreach($listbl as $bl):
            ?>
                <td><?=taikhoan_name($bl['iduser'])?></td>
                <td><?=$bl['noidung']?></td>
                <td><?=$bl['ngaybinhluan']?></td>
            </tr>
            <?php
                endforeach
            ?>
        </table>
         <div class="card-footer text-danger ">
            <?php
                if(isset($_SESSION['user'])){
            ?>
                <form action="<?=$_SERVER['PHP_SELF'];?>" class="row" method="POST">
                    <input type="hidden" name="idpro" value="<?=$idpro?>">
                    <div class="col-10">
                        <input type="text" class="form-control" name="textbl">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-dark" name="btn_bl">Gửi bình luận</button>
                    </div>
                </form>
            <?php
                }else{
            ?>
                Đăng nhập để bình luận về sản phẩm này 
            <?php
                }
            ?>
        </div> 
    </div>
</body>

</html>