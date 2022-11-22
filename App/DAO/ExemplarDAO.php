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
//        var_dump($exemplar);
//        exit();
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO EXEMPLAR(num_serie, isbn_10, isbn_13, status, paginas_exemplar, id_editora, id_titulo, id_idioma) VALUES (?,?,?,?,?,?,?,?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $exemplar->getNumSerie());
        $conn->bindValue(2, $exemplar->getISBN10());
        $conn->bindValue(3, $exemplar->getISBN13());
        $conn->bindValue(4, $exemplar->getStatus());
        $conn->bindValue(5, $exemplar->getPaginasExemplar());
        $conn->bindValue(6, $exemplar->getIdEditora());
        $conn->bindValue(7, $exemplar->getIdTitulo());
        $conn->bindValue(8, $exemplar->getIdIdioma());


        return $conn->execute();
    }

    public static function update(Exemplar $exemplar): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE EXEMPLAR SET isbn_10 = ?, isbn_13 = ?, status = ?, paginas_exemplar = ?, id_editora = ?, id_titulo = ?, id_idioma = ? WHERE id_exemplar = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $exemplar->getISBN10());
        $conn->bindValue(2, $exemplar->getISBN13());
        $conn->bindValue(3, $exemplar->getStatus());
        $conn->bindValue(4, $exemplar->getPaginasExemplar());
        $conn->bindValue(5, $exemplar->getIdEditora());
        $conn->bindValue(6, $exemplar->getIdTitulo());
        $conn->bindValue(7, $exemplar->getIdIdioma());
        $conn->bindValue(8, $exemplar->getId());



        if($conn->execute()){
            return self::getOne($exemplar->getId());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE FROM EXEMPLAR WHERE id_exemplar = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }

    public static function baixaExemplar($idExemplar)
    {
        $conn = Conexao::getInstance();

        $sql = "UPDATE EXEMPLAR SET STATUS = 1 WHERE id_exemplar = ?";
        $sql = $conn->prepare($sql);
        $sql->bindValue(1, $idExemplar);

        if($sql->execute())
            return true;

        return false;
    }
}