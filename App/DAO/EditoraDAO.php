<?php

namespace App\DAO;

use App\Model\Editora;

class EditoraDAO
{
    private function __construct(){
    }

    public static function getAll(): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM EDITORAS";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll();
        }

        return false;
    }

    public static function getOne($id): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM EDITORAS WHERE ideditoras = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if($conn->rowCount() > 0){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(Editora $editora): bool
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO EDITORAS(nome_editora) VALUES (?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $editora->getNomeEditora());

        return $conn->execute();
    }

    public static function update(Editora $editora): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE EDITORAS SET nome_editora = ? WHERE ideditoras = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $editora->getNomeEditora());

        if($conn->execute()){
            return self::getOne($editora->getIdeditoras());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE EDITORAS WHERE ideditoras = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}