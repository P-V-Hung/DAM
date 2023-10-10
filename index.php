<?php
    session_start();
    require "./model/pdo.php";
    require "./model/sanpham.php";
    require "./model/taikhoan.php";
    require "./model/cart.php";
    require "./model/danhmuc.php";
    require "./view/header.php";
    
    if(isset($_GET['iddm'])&&($_GET['iddm']!="")){
        $iddm = $_GET['iddm'];
        $dmhientai = get_danhmuc($iddm);
    }else{
        $iddm = 0;
    }
    if(!isset($_SESSION['mycart'])){
        $_SESSION['mycart'] = [];
    }
    $listsp = list_sanpham();
    $listdm = list_danhmuc();
    $listspTop10 = list_sanpham_top10();

    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act = $_GET['act'];
        switch($act){
            case 'ctsp':
                $id = $_GET['id'];
                $sp = get_sanpham($id);
                $spcl = list_sanpham_cungloai($id,$sp['id_dm']);
                require 'view/home.php';
                break;
            case 'dangnhap':
                if(isset($_POST['btn_login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $checkuser = checkuser($username,$password);
                    if(empty($checkuser)){
                        $_SESSION['thongbao'] = 'Tài khoản không tồn tại!';
                    }else{
                        $_SESSION['user'] = $checkuser;
                        header('Location: index.php');
                    }
                }
                require 'view/home.php';
                break;
            case 'thoat':
                unset($_SESSION['user']);
                require 'view/home.php';
                break;

            case "gioithieu":
                require "view/gioithieu.php";
                break;
            case "lienhe":
                require "view/lienhe.php";
                break;
            default:
                require "./view/home.php";
        }
    }else{
        require "./view/home.php";
    }
    require "./view/footer.php";
?>