<?php

namespace App\DAO;

use App\Model\Idioma;

class IdiomaDAO
{
    private function __construct(){

    }

    public static function getAll(): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM IDIOMAS";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll();
        }

        return false;
    }

    public static function getOne($id): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM IDIOMAS WHERE ididiomas = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if($conn->rowCount() > 0){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(Idioma $idioma): bool
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO IDIOMAS(idioma_nome) VALUES (?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $idioma->getIdiomaNome());

        return $conn->execute();
    }

    public static function update(Idioma $idioma): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE IDIOMAS SET idioma_nome = ? WHERE ididiomas = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $idioma->getIdiomaNome());


        if($conn->execute()){
            return self::getOne($idioma->getIdidiomas());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE IDIOMAS WHERE ididiomas = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}