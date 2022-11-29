<?php

namespace App\DAO;

use App\Model\Cliente;

class ClienteDAO
{
    public static function getAll()
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM Cliente, PESSSOA_FISICA";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function getById($id)
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM Cliente, PESSSOA_FISICA";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function save(Cliente $cliente)
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO Cliente (id_pessoaFisica, matricula) VALUES (?, ?)";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $cliente->getIdPessoaFisica());
        $sql->bindValue(2, $cliente->getMatricula());

        if($sql->execute())
            return $conn->lastInsertId();

        return false;
    }

    public static function update(Colaborador $cliente)
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE Cliente SET COLABORADOR_MATRICULA = ? WHERE ID_Cliente = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $cliente->getMatriculaColaborador());
        $sql->bindValue(2, $cliente->getIdColaborador());

        if($sql->execute())
            return self::getById($cliente->getIdColaborador());

        return false;
    }

    public static function delete($id)
    {
        $conn = Conexao::getInstance();
        $sql = "DELETE FROM Cliente WHERE ID_Cliente = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);

        if($sql->execute())
            return true;

        return false;
    }
}