<?php

namespace App\DAO;

use App\Model\Titulo;

class TituloDAO
{
    private function __construct(){

    }

    public static function getAll(): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM TITULO";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll();
        }

        return false;
    }

    public static function getOne($id): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM TITULO WHERE id_titulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if($conn->rowCount() > 0){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(Titulo $titulo): false | string
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO TITULO(nome_titulo, paginas_titulo, id_idioma) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $titulo->getNomeTitulo());
        $stmt->bindValue(2, $titulo->getPaginasTitulo());
        $stmt->bindValue(3, $titulo->getIdIdiomas());

        $stmt->execute();

        return $conn->lastInsertId();
    }

    public static function update(Titulo $titulo): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE TITULO SET nome_titulo = ?, paginas_titulo = ?, id_idioma = ? WHERE id_titulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $titulo->getNomeTitulo());
        $conn->bindValue(2, $titulo->getPaginasTitulo());
        $conn->bindValue(3, $titulo->getIdIdiomas());
        $conn->bindValue(4, $titulo->getId());


        if($conn->execute()){
            return self::getOne($titulo->getId());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE FROM TITULO WHERE id_titulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}