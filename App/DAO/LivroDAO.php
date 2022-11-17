<?php

namespace App\DAO;

class LivroDAO
{
    private function __construct(){
    }

    public static function getAll(): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM EXEMPLAR as E INNER JOIN TITULO as T ON E.ID_TITULO = T.ID_TITULO
                INNER JOIN IDIOMA as I ON T.ID_IDIOMA = I.ID_IDIOMA
                INNER JOIN EDITORA as ED ON E.ID_EDITORA = ED.ID_EDITORA";
        $conn = $conn->prepare($sql);

        if($conn->execute()){
            return $conn->fetchAll(\PDO::FETCH_ASSOC);
        }

        return false;
    }

}