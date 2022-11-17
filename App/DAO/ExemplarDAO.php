<?php

namespace App\DAO;

use App\Model\Exemplar;

class ExemplarDAO
{
    private function __construct(){
    }

    public static function getAll(): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM EXEMPLAR";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll();
        }

        return false;
    }

    public static function getOne($id): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM EXEMPLAR WHERE id_exemplar = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if($conn->rowCount() > 0){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(Exemplar $exemplar): bool
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO EXEMPLAR(num_serie, isbn_10, isbn_13, status, id_editora, id_titulo) VALUES (?,?,?,?,?,?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $exemplar->getNumSerie());
        $conn->bindValue(2, $exemplar->getISBN10());
        $conn->bindValue(3, $exemplar->getISBN13());
        $conn->bindValue(4, $exemplar->getStatus());
        $conn->bindValue(5, $exemplar->getIdEditora());
        $conn->bindValue(6, $exemplar->getIdTitulo());


        return $conn->execute();
    }

    public static function update(Exemplar $exemplar): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE EXEMPLAR SET num_serie = ?, isbn_10 = ?, isbn_13 = ?, status = ?, id_editora = ?, id_titulo = ? WHERE id_exemplar = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $exemplar->getNumSerie());
        $conn->bindValue(1, $exemplar->getISBN10());
        $conn->bindValue(1, $exemplar->getISBN13());
        $conn->bindValue(1, $exemplar->getStatus());
        $conn->bindValue(1, $exemplar->getIdEditora());
        $conn->bindValue(1, $exemplar->getIdTitulo());



        if($conn->execute()){
            return self::getOne($exemplar->getId());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE EXEMPLAR WHERE id_exemplar = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}