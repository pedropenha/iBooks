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
        $sql = "SELECT * FROM EXEMPLAR WHERE idexemplar = ?";
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
        $sql = "INSERT INTO EXEMPLAR(numero_de_serie, ISBN_10, ISBN_13, editoras_ideditoras, titulo_idtitulo, status) VALUES (?,?,?,?,?,?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $exemplar->getNumeroDeSerie());
        $conn->bindValue(1, $exemplar->getISBN10());
        $conn->bindValue(1, $exemplar->getISBN13());
        $conn->bindValue(1, $exemplar->getEditorasIdeditoras());
        $conn->bindValue(1, $exemplar->getTituloIdtitulo());
        $conn->bindValue(1, $exemplar->getStatus());

        return $conn->execute();
    }

    public static function update(Exemplar $exemplar): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE EXEMPLAR SET numero_de_serie = ?, ISBN_10 = ?, ISBN_13 = ?, editoras_ideditoras = ?, titulo_idtitulo = ?, status = ? WHERE idtitulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $exemplar->getNumeroDeSerie());
        $conn->bindValue(1, $exemplar->getISBN10());
        $conn->bindValue(1, $exemplar->getISBN13());
        $conn->bindValue(1, $exemplar->getEditorasIdeditoras());
        $conn->bindValue(1, $exemplar->getTituloIdtitulo());
        $conn->bindValue(1, $exemplar->getStatus());


        if($conn->execute()){
            return self::getOne($exemplar->getIdexemplar());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE EXEMPLAR WHERE idexemplar = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}