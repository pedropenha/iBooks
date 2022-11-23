<?php

namespace App\DAO;

use App\Model\FilaDeEspera;

class FilaDeEsperaDAO
{
    private function __construct()
    {

    }

    public static function getAll(): bool|array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM LISTA_DE_ESPERA";
        $conn = $conn->prepare($sql);

        if ($conn->execute()) {
            return $conn->fetchAll();
        }

        return false;
    }

    public static function getOne($id): bool|array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM LISTA_DE_ESPERA WHERE id = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(FilaDeEspera $filaDeEspera): false|string
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO LISTA_DE_ESPERA (id_exemplar, id_pessoa_fisica) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $filaDeEspera->getIdExemplar());
        $stmt->bindValue(2, $filaDeEspera->getIdPessoaFisica());

        $stmt->execute();

        return $conn->lastInsertId();
    }

//vai alterar titulo por isbn
    public static function update(FilaDeEspera $filaDeEspera): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE LISTA_ESPERA SET id_exemplar = ?, id_pessoa_fisica = ? WHERE id_titulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $filaDeEspera->getIdExemplar());
        $conn->bindValue(2, $filaDeEspera->getIdPessoaFisica());
        $conn->bindValue(2, $filaDeEspera->getId());


        if ($conn->execute()) {
            return self::getOne($filaDeEspera->getId());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE FROM LISTA_ESPERA WHERE id = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}