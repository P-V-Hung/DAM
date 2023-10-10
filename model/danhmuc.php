<?php
    function insert_danhmuc($tenloai){
        $sql = "INSERT INTO `danhmuc` (`name`) VALUES ('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql = "DELETE FROM sanpham WHERE `sanpham`.`id_dm` = $id";
        pdo_execute($sql);
        $sql = "DELETE FROM danhmuc WHERE `danhmuc`.`id` = $id";
        pdo_execute($sql);
    }
    function list_danhmuc(){
        $sql = "SELECT * FROM `danhmuc` order by id desc";
        return pdo_query($sql);
    }
    function update_danhmuc($name,$id){
        $sql = "UPDATE `danhmuc` SET `name` = '$name' WHERE `danhmuc`.`id` = $id";
        pdo_execute($sql);
    }
    function get_danhmuc($id){
        $sql = "SELECT * FROM `danhmuc` WHERE id=$id";
        return pdo_query_one($sql);
    }

?>