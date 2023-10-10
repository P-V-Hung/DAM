<?php
     function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql = "INSERT INTO `binhluan` (`noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES ('$noidung', '$iduser', '$idpro', '$ngaybinhluan');";
        pdo_execute($sql);
    }
     function delete_binhluan($id){
        $sql = "DELETE FROM binhluan WHERE `binhluan`.`id` = $id";
        pdo_execute($sql);
    }
    function list_binhluan($idpro){
        $sql = "SELECT * FROM `binhluan` WHERE 1";
        if($idpro>0){
            $sql.= " AND `idpro`= '".$idpro."'";
        }
        $sql.= " order by id desc";
        return pdo_query($sql);
    }
    function list_binhluan_top10(){
        $sql = "SELECT * FROM `binhluan` order by id desc limit 10";
        return pdo_query($sql);
    }
?>