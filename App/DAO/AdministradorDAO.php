<?php

namespace App\DAO;

use App\Model\Administrador;

class AdministradorDAO
{
    public static function getAll()
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM Administrador, PESSSOA_FISICA";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function getById($id)
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM Administrador, PESSSOA_FISICA";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function save(Administrador $Administrador)
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO administrador (id_pessoaFisica, matricula) VALUES (?, ?)";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $Administrador->getIdPessoaFisica());
        $sql->bindValue(2, $Administrador->getMatricula());

        if($sql->execute())
            return $conn->lastInsertId();

        return false;
    }

    public static function update(Administrador $Administrador)
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE Administrador SET Administrador_MATRICULA = ? WHERE ID_Administrador = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $Administrador->getMatriculaAdministrador());
        $sql->bindValue(2, $Administrador->getIdAdministrador());

        if($sql->execute())
            return self::getById($Administrador->getIdAdministrador());

        return false;
    }

    public static function delete($id)
    {
        $conn = Conexao::getInstance();
        $sql = "DELETE FROM Administrador WHERE ID_Administrador = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);

        if($sql->execute())
            return true;

        return false;
    }
}