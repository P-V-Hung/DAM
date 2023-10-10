<div class="row">
    <article class="col-sm-9 mt-2 px-0">
        <?php
        if (isset($_GET['act'])&&$_GET['act'] != "") {
            $act = $_GET['act'];
            switch($act){
                case 'ctsp':
                    require 'view/chitietsp.php';
                    break;
                case 'danhmuc':
                    if(isset($_POST['title_search']) && ($_POST['title_search']!="")){
                        $kyw = $_POST['title_search'];
                    }else{
                        $kyw = "";
                    }
                    $listsp = load_sanpham($kyw,$iddm);
                    require 'view/dssanpham.php';
                    break;
                case 'dangki':
                    if(isset($_POST['btn_logup'])){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        insert_taikhoan($user,$pass,$email,$address,$tel);
                        $thongbao= "Đã đăng ký thành công. Vui lòng đăng nhập!";
                    }
                    require 'view/taikhoan/dangki.php';
                    break;
                case 'edit_tk':
                    if(isset($_POST['btn_update'])){
                        $id = $_POST['id'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        update_taikhoan($id,$user,$pass,$email,$address,$tel);
                        $_SESSION['user'] = checkuser($user,$pass);
                        $thongbao = 'Cập nhật thành công';
                    }
                    require 'view/taikhoan/edittk.php';
                    break;
                case 'quenmk':
                    if(isset($_POST['btn_search'])){
                        $email=$_POST['email'];
                        $checkemail = checkemail($email);
                        if(empty($checkemail)){
                            $thongbao = 'Email không tồn tại';
                        }else{
                            $thongbao = 'Tài khoản của bạn là: '.$checkemail['user'].'<br>Mật khẩu của bạn là: '.$checkemail['pass'];
                        }
                    }
                    require 'view/taikhoan/quenmk.php';
                    break;


                    // card
                case 'addtocart':
                    if(isset($_POST['btn_addcard'])&&($_POST['btn_addcard']!="")){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $count = 1;
                        $ttien = $count * $price;
                        $addcart = [$id,$name,$img,$price,$count,$ttien];
                        array_push($_SESSION['mycart'],$addcart);
                    }
                    require 'view/cart/viewcart.php';
                    break;
                case 'xoacart':
                    if(isset($_GET['idcart'])){
                        $vtx = $_GET['idcart'];
                        array_splice($_SESSION['mycart'],$vtx,1);
                    }else{
                        $_SESSION['mycart'] = [];
                    }
                    header("Location: home.php?act=viewcart");
                    break;
                case 'viewcart':
                    require 'view/cart/viewcart.php';
                    break;
                case 'yesdh':
                    require 'view/cart/idkhachhang.php';
                    break;
                case 'billcomfirm':
                    if(isset($_POST['yesbill'])){
                        if(isset($_SESSION['user'])){
                            $iduser = $_SESSION['user']['id'];
                        }else{
                            $iduser = 0;
                        }
                        $name = $_POST['user'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $pttt = $_POST['pttt'];
                        $ngaydathang = date('h:i:sa d/m/Y');
                        $tongdonhang = tongdonhang();
                        $idbill = insert_bill($name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang,$iduser);

                        if(isset($_SESSION['user']['id'])){
                            $idu = $_SESSION['user']['id'];
                        }else{
                            $idu = 0;
                        }

                        foreach($_SESSION['mycart'] as $cart){
                            insert_cart($idu,$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                        }
                        $bill = get_bill($idbill);
                    }
                    require 'view/cart/billcart.php';
                    break;
                
                case 'mycart':
                    $listbill = query_bill($kyc=0,$_SESSION['user']['id']);
                    require 'view/cart/mycart.php';
                    break;
                default:
                    require "view/layout/boxleft.php";
                    break;
            }
        } else {
            require "view/layout/boxleft.php";
        }
        ?>
    </article>

    <aside class="col-sm-3 px-0 d-flex flex-column align-items-end">
        <?php
        require "view/layout/boxright.php";
        ?>
    </aside>

</div>