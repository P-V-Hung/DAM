<?php
    function pdo_get_connection(){
        $hostname = 'localhost';
        $dbname = 'asm_dam';
        $username = 'root';
        $password = '';

        try{
            $conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            $e -> getMessage();
        }
    }

    function pdo_execute($sql){
        $sql_agms = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agms);
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }
    function pdo_execute_lastInsertId($sql){
        $sql_agms = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agms);
            return $conn -> lastInsertId();
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }


    function pdo_query($sql){
        $sql_agms = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agms);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    function pdo_query_one($sql){
        $sql_agms = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agms);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    function pdo_query_value($sql){
        $sql_agms = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_agms);
            $row =  $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    

?>