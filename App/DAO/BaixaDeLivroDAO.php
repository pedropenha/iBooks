<?php

namespace App\DAO;

use App\Model\BaixaDeLivro;

class BaixaDeLivroDAO
{
    public static function getAll()
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM BAIXA_DE_LIVRO";
        $sql = $conn->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function getById($id)
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM BAIXA_DE_LIVRO WHERE ID_BAIXA_LIVRO = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0)
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

    public static function save(BaixaDeLivro $baixaDeLivro)
    {
        $conn = Conexao::getInstance();

        $sql = "INSERT INTO BAIXA_DE_LIVRO (exemplar_id, colaborador_id, motivo_baixa, data_baixa) VALUES (?,?,?,?)";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $baixaDeLivro->getExemplarId());
        $sql->bindValue(2, $baixaDeLivro->getColaboradorId());
        $sql->bindValue(3, $baixaDeLivro->getMotivoBaixa());
        $sql->bindValue(4, $baixaDeLivro->getDataBaixa());

        if($sql->execute())
            return $conn->lastInsertId();

        return false;
    }

    public static function update(BaixaDeLivro $baixaDeLivro)
    {
        $conn = Conexao::getInstance();

        $sql = "UPDATE BAIXA_DE_LIVRO SET motivo_baixa = ?, data_baixa = ? WHERE id_baixa_livro = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $baixaDeLivro->getMotivoBaixa());
        $sql->bindValue(2, $baixaDeLivro->getDataBaixa());
        $sql->bindValue(3, $baixaDeLivro->getIdBaixaLivro());

        if($sql->execute())
            return self::getById($baixaDeLivro->getIdBaixaLivro());

        return false;
    }

    public static function delete($id)
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE FROM BAIXA_DE_LIVRO WHERE id_baixa_livro = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $id);

        if($sql->execute())
            return true;

        return false;
    }
}