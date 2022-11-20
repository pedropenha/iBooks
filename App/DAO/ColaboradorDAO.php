<?php

namespace App\DAO;

use App\Model\Colaborador;

class ColaboradorDAO
{
    public static function getAll()
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM COLABORADOR, PESSSOA_FISICA";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function getById($id)
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM COLABORADOR, PESSSOA_FISICA";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function save(Colaborador $colaborador)
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO COLABORADOR (id_pessoaFisica, colaborador_matricula) VALUES (?, ?)";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $colaborador->getIdPessoaFisica());
        $sql->bindValue(2, $colaborador->getMatriculaColaborador());

        if($sql->execute())
            return $conn->lastInsertId();

        return false;
    }

    public static function update(Colaborador $colaborador)
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE COLABORADOR SET COLABORADOR_MATRICULA = ? WHERE ID_COLABORADOR = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $colaborador->getMatriculaColaborador());
        $sql->bindValue(2, $colaborador->getIdColaborador());

        if($sql->execute())
            return self::getById($colaborador->getIdColaborador());

        return false;
    }

    public static function delete($id)
    {
        $conn = Conexao::getInstance();
        $sql = "DELETE FROM COLABORADOR WHERE ID_COLABORADOR = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);

        if($sql->execute())
            return true;

        return false;
    }
}