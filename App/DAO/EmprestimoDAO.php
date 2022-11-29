<?php

namespace App\DAO;

use App\Model\Emprestimo;

class EmprestimoDAO
{
    public static function getAll()
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM emprestimo";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function getById($id)
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM emprestimo WHERE id_emprestimo = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetch(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function exemplarJaEmprestado(Emprestimo $emprestimo){
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM emprestimo WHERE id_exemplar = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $emprestimo->getIdExemplar());

        if($sql->execute()){
            if($sql->rowCount() > 0)
                return true;
        }

        return false;
    }

    public static function save(Emprestimo $emprestimo)
    {
        $conn = Conexao::getInstance();

        $sql = "INSERT INTO emprestimo (id_cliente, id_colaborador, id_exemplar) VALUES (?,?,?)";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $emprestimo->getIdCliente());
        $sql->bindValue(2, $emprestimo->getIdColaborador());
        $sql->bindValue(3, $emprestimo->getIdExemplar());

        if($sql->execute())
            return $conn->lastInsertId();

        return false;
    }

    public static function update(Emprestimo $emprestimo)
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE emprestimo SET id_cliente = ?, id_colaborador = ?, id_exemplar = ? WHERE id_emprestimo = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $emprestimo->getIdCliente());
        $sql->bindValue(2, $emprestimo->getIdColaborador());
        $sql->bindValue(3, $emprestimo->getIdExemplar());
        $sql->bindValue(4, $emprestimo->getIdEmprestimo());

        if($sql->execute())
            return self::getById($emprestimo->getIdEmprestimo());

        return false;
    }

    public static function delete($id)
    {
        $conn = Conexao::getInstance();
        $sql = "DELETE FROM emprestimo WHERE id_emprestimo = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);

        if($sql->execute())
            return true;

        return false;
    }

}