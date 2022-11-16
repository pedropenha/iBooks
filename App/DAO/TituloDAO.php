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
        $sql = "SELECT * FROM TITULO WHERE idtitulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);
        $conn->execute();

        if($conn->rowCount() > 0){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function save(Titulo $titulo): bool
    {
        $conn = Conexao::getInstance();
        $sql = "INSERT INTO TITULO(nome_titulo, qtde_paginas_titulo, idiomas_ididiomas) VALUES (?,?,?)";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $titulo->getNomeTitulo());
        $conn->bindValue(2, $titulo->getQtdePaginasTitulo());
        $conn->bindValue(3, $titulo->getIdiomasIdidiomas());

        return $conn->execute();
    }

    public static function update(Titulo $titulo): mixed
    {
        $conn = Conexao::getInstance();
        $sql = "UPDATE TITULO SET nome_titulo = ?, qtde_paginas_titulo = ?, idiomas_ididiomas = ? WHERE idtitulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $titulo->getNomeTitulo());
        $conn->bindValue(2, $titulo->getQtdePaginasTitulo());
        $conn->bindValue(3, $titulo->getIdiomasIdidiomas());


        if($conn->execute()){
            return self::getOne($titulo->getIdtitulo());
        }

        return false;
    }

    public static function delete($id): bool
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE TITULO WHERE idtitulo = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $id);

        return $conn->execute();
    }
}