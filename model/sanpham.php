<?php
    function insert_sanpham($name,$price,$nameImg,$mota,$luotxem,$iddm){
        $sql = "INSERT INTO `sanpham` (`name`, `price`, `img`, `mota`, `luotxem`, `id_dm`) VALUES ('$name', '$price', '$nameImg', '$mota', '$luotxem', '$iddm');";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql = "DELETE FROM sanpham WHERE `sanpham`.`id` = $id";
        pdo_execute($sql);
    }
    function list_sanpham(){
        $sql = "SELECT s.*, d.name as name_dm FROM `sanpham` s JOIN `danhmuc` d ON s.id_dm=d.id order by id desc";
        return pdo_query($sql);
    }
    function load_sanpham($kyw = "",$iddm = 0){
        $sql = "SELECT * FROM `sanpham` WHERE 1 ";
        if($kyw != ""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm != 0){
            $sql.=" and id_dm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        return pdo_query($sql);
    }
    function list_sanpham_cungloai($id,$iddm){
        $sql = "SELECT s.*,d.name as name_dm FROM sanpham s JOIN danhmuc d ON s.id_dm = d.id WHERE s.id <> 18 AND d.id = $iddm;";
        return pdo_query($sql);
    }
    function list_sanpham_top10(){
        $sql = "SELECT s.*, d.name as name_dm FROM `sanpham` s JOIN `danhmuc` d ON s.id_dm=d.id order by luotxem desc limit 10";
        return pdo_query($sql);
    }
    function list_sanpham_top10new(){
        $sql = "SELECT * FROM `sanpham` order by id desc limit 10";
        return pdo_query($sql);
    }
    function update_sanpham($id,$name,$price,$nameImg,$mota,$luotxem,$iddm){
        $sql = "UPDATE `sanpham` SET `name` = '$name', `price` = '$price', `img` = '$nameImg', `mota` = '$mota', `luotxem` = '$luotxem', `id_dm` = '$iddm' WHERE `sanpham`.`id` = $id";
        pdo_execute($sql);
    }
    function get_sanpham($id){
        $sql = "SELECT * FROM `sanpham` WHERE id=$id";
        return pdo_query_one($sql);
    }
    function up_file($hinh,$nameImg){
        move_uploaded_file($hinh['tmp_name'],"image/".$nameImg);
    }
    function update_luotxem($id,$luotxem){
        $sql = "UPDATE `sanpham` SET `luotxem` = '$luotxem' WHERE `sanpham`.`id` = $id";
        pdo_execute($sql);
    }
    function danhmuc_name($iddm){
        $listsp = list_sanpham();
        foreach($listsp as $sp){
            if($sp['id_dm']==$iddm){
                return $sp['name_dm'];
            }
        }
    }
    function sanpham_name($idsp){
        $listsp = list_sanpham();
        foreach($listsp as $sp){
            if($sp['id']==$idsp){
                return $sp['name'];
            }
        }
    }
?>