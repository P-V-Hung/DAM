<?php
    function insert_taikhoan($user,$pass,$email,$address,$tel,$role=2){
        $sql = "INSERT INTO `taikhoan` (`user`,`pass`,`email`,`address`,`tel`,`role`) VALUES ('$user','$pass','$email','$address','$tel','$role')";
        pdo_execute($sql);
    }
    function delete_taikhoan($id){
        $sql = "DELETE FROM taikhoan WHERE `taikhoan`.`id` = $id";
        pdo_execute($sql);
    }
    function check_vitri($role){
        if($role==1){
            echo 'Quản trị viên';
        }else{
            echo 'Người dùng';
        }
    }
    function list_taikhoan(){
        $sql = "SELECT * FROM `taikhoan` order by id desc";
        return pdo_query($sql);
    }
    function list_chucvu(){
        $sql = "SELECT * FROM `chucvu`";
        return pdo_query($sql);
    }
    function checkuser($user,$pass){
        $sql = "SELECT * FROM taikhoan WHERE user = '$user' AND pass = '$pass';";
        return pdo_query_one($sql);
    }
    function get_taikhoan($id){
        $sql = "SELECT * FROM taikhoan WHERE id=$id";
        return pdo_query_one($sql);
    }
    function checkemail($email){
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        return pdo_query_one($sql);
    }
    function update_taikhoan($id,$user,$pass,$email,$address,$tel,$role=2){
        $sql = "UPDATE `taikhoan` SET `user` = '$user', `pass` = '$pass', `email` = '$email', `address` = '$address', `tel` = '$tel', `role` = '$role' WHERE `taikhoan`.`id` = $id";
        pdo_execute($sql);
    }
    function taikhoan_name($idtk){
        $sql = "SELECT user FROM `taikhoan` WHERE id = $idtk";
        $user = pdo_query_one($sql);
        return $user['user'];
    }
?>