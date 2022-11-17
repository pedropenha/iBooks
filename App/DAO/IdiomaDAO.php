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
        $sql = "SELECT * FROM IDIOMA";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function getOne($id): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM IDIOMA WHERE id_idioma = ?";
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
        $sql = "INSERT INTO IDIOMA(nome_idioma) VALUES (?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $idioma->getNomeIdioma());

        return $conn->execute();
    }

    public static function update(Idioma $idioma): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE IDIOMA SET nome_idioma = ? WHERE id_idioma = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $idioma->getId());


        if($conn->execute()){
            return self::getOne($idioma->getId());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE FROM IDIOMA WHERE id_idioma = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}