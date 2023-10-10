<?php
    require "header.php";
    require "../model/pdo.php";
    require "../model/danhmuc.php";
    require "../model/binhluan.php";
    require "../model/cart.php";
    require "../model/sanpham.php";
    require "../model/taikhoan.php";
    if(isset($_GET['act']) && $_GET['act'] != ""){
        $act = $_GET['act'];
        switch($act){
            case 'adddm':
                if(isset($_POST['btn_adddm'])){
                    $tenloai = $_POST['ten_loai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                require "danhmuc/add.php";
                break;
            case 'listdm':
                $listdm = list_danhmuc();
                require "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delete_danhmuc($id);
                    $thongbao = "Xóa thành công";
                }
                $listdm = list_danhmuc();
                require "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $dm = get_danhmuc($id);
                }
                require "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['btn_updatedm'])){
                    $id = $_POST['id'];
                    $name = $_POST['ten_loai'];
                    update_danhmuc($name,$id);
                    $thongbao = "Sửa thành công";
                }
                $listdm = list_danhmuc();
                require "danhmuc/list.php";
                break;
                // Danh mục

            case 'addsp':
                $listdm = list_danhmuc();
                if(isset($_POST['btn_addsp'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $hinh = $_FILES['hinh'];
                    $nameImg = basename($hinh['name']);
                    $luotxem = $_POST['luotxem'];
                    $loaihang = $_POST['loaihang'];
                    $mota = $_POST['mota'];
                    up_file($hinh,$nameImg);
                    insert_sanpham($name,$price,$nameImg,$mota,$luotxem,$loaihang);
                    $thongbao = "Thêm thành công";
                }
                require "sanpham/add.php";
                break;
            case 'listsp':
                $listdm = list_danhmuc();
                $listsp = load_sanpham();
                $iddm = 0;
                if(isset($_POST['btn_locsp'])){
                    $iddm = $_POST['danhmuc'];
                    $listsp = load_sanpham("",$iddm);
                }
                require "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delete_sanpham($id);
                    $thongbao = "Xóa thành công";
                }
                $iddm = 0;
                $listsp = list_sanpham();
                require "sanpham/list.php";
                break;
            case 'suasp':
                $listdm = list_danhmuc();
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sp = get_sanpham($id);
                }
                require "sanpham/update.php";
                break;
            case 'updatesp':
                if(isset($_POST['btn_updatesp'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $hinh = $_FILES['hinh'];
                    $nameImg = basename($hinh['name']);
                    $luotxem = $_POST['luotxem'];
                    $loaihang = $_POST['loaihang'];
                    $mota = $_POST['mota'];
                    $sp = get_sanpham($id);
                    if(!move_uploaded_file($hinh['tmp_name'],"image/".$nameImg)){
                        $nameImg = $sp['img'];
                    }
                    update_sanpham($id,$name,$price,$nameImg,$mota,$luotxem,$loaihang);
                    $thongbao = "Sửa thành công";
                }
                $iddm = 0;
                $listsp = list_sanpham();
                require "sanpham/list.php";
                break;
                // Sản phẩm


            case 'addkh':
                $listcv = list_chucvu();
                if(isset($_POST['btn_addkh'])){
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $role = $_POST['role'];
                    insert_taikhoan($user,$pass,$email,$address,$tel,$role);
                    $thongbao = "Thêm thành công";
                }
                require "taikhoan/add.php";
                break;
            case 'listkh':
                $listtk = list_taikhoan();
                require "taikhoan/list.php";
                break;
            case 'xoakh':
                $id = $_GET['id'];
                delete_taikhoan($id);
                $listtk = list_taikhoan();
                $thongbao = "Xóa thành công";
                require "taikhoan/list.php";
                break;
            case 'suakh':
                $id = $_GET['id'];
                $tk = get_taikhoan($id);
                $listcv = list_chucvu();
                require "taikhoan/edit.php";
                break;
            case 'editkh':
                    if(isset($_POST['btn_updatekh'])){
                        $id = $_POST['id'];
                        $user = $_POST['username'];
                        $pass = $_POST['password'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $role = $_POST['role'];
                        update_taikhoan($id,$user,$pass,$email,$address,$tel,$role);
                        $thongbao = "Sửa thành công";
                    }
                    $listtk = list_taikhoan();
                    require 'taikhoan/list.php';
                break;

                // Khách hàng


            case 'listbl':
                $listbl = list_binhluan(0);
                require "binhluan/list.php";
                break;
            case 'xoabl':
                if(isset($_GET['id'])&&($_GET!="")){
                    $id = $_GET['id'];
                    delete_binhluan($id);
                    $thongbao = 'Xóa thành công';
                }
                $listbl = list_binhluan(0);
                require "binhluan/list.php";
                break;
                
                // bình luận

            
            case 'listbill':
                $kyc = 0;
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyc = $_POST['kyw'];
                }
                $listbill = query_bill($kyc,0);
                require 'bill/listbill.php';
                break;

            case 'xoabill':
                $kyc = 0;
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyc = $_POST['kyw'];
                }
                if(isset($_GET['id'])&&($_GET['id']!="")){
                    $id = $_GET['id'];
                    delete_bill($id);
                    $thongbao = 'Xóa thành công';
                }
                $listbill = query_bill($kyc);
                
                require 'bill/listbill.php';
                break;

            case 'suabill':
                if(isset($_GET['id'])){
                    $bill = get_bill($_GET['id']);
                }
                if(isset($_POST['btn_updatebill'])){
                    $ttdh = $_POST['ttbill'];
                    $id = $_POST['id'];
                    update_bill($id,$ttdh);
                    $thongbao = 'Cập nhật thành công';
                    header("Location: index.php?act=listbill ");
                }
                require 'bill/edit.php';
                break;
                // listbill
            
            case 'listtk':
                $listtk = list_thongke();
                require "thongke/list.php";
                break;
            case 'bieudotk':
                $listtk = list_thongke();
                require 'thongke/bieudo.php';
                break;
                // thongke
            default:
                require "home.php";
                break;
        }
    }else{
        require "home.php";
    }
    require "footer.php";
