<?php

namespace App\DAO;

class LoginDAO
{
    public static function getAll(){
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM CATEGORIA";
        $conn = $conn->prepare($sql);

        $conn->execute();

        if($conn->rowCount() > 0)
            return $conn->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function getOne($id){
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM CATEGORIA WHERE idCategoria = ?";
        $sql = $conn->prepare($sql);

        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }
}