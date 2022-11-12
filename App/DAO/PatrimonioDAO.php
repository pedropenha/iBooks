<?php

namespace App\DAO;

use App\Model\Patrimonio;

class PatrimonioDAO
{
    private function __construct(){

    }

    public static function getAll(): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM PATRIMONIO";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll();
        }

        return false;
    }

    public static function getOne($id): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM PATRIMONIO WHERE idPatrimonio = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if($conn->rowCount() > 0){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(Patrimonio $patrimonio): bool
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO PATRIMONIO(nome, valor, data_compra, categoria, numero_serie) VALUES (?,?,?,?,?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $patrimonio->getNomePatrimonio());
        $conn->bindValue(2, $patrimonio->getValorPatrimonio());
        $conn->bindValue(3, $patrimonio->getDataAquisicao());
        $conn->bindValue(4, $patrimonio->getCategoria());
        $conn->bindValue(5, $patrimonio->getNumeroPatrimonio());

        return $conn->execute();
    }

    public static function update(Patrimonio $patrimonio): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE PATRIMONIO SET nome = ?, valor = ?, data_compra = ?, categoria = ?, numero_serie = ? WHERE idPatrimonio = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $patrimonio->getNomePatrimonio());
        $conn->bindValue(2, $patrimonio->getValorPatrimonio());
        $conn->bindValue(3, $patrimonio->getDataAquisicao());
        $conn->bindValue(4, $patrimonio->getCategoria());
        $conn->bindValue(5, $patrimonio->getNumeroPatrimonio());
        $conn->bindValue(6, $patrimonio->getIdPatrimonio());

        if($conn->execute()){
            return self::getOne($patrimonio->getIdPatrimonio());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE PATRIMONIO WHERE idPatrimonio = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}