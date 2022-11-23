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

    public static function getOne($ID): bool | array
    {
        $conn = Conexao::getInstance();
        $sql = "SELECT * FROM EXEMPLAR as E INNER JOIN TITULO as T ON E.ID_TITULO = T.ID_TITULO
                INNER JOIN IDIOMA as I ON T.ID_IDIOMA = I.ID_IDIOMA
                INNER JOIN EDITORA as ED ON E.ID_EDITORA = ED.ID_EDITORA
                WHERE E.ID_EXEMPLAR = ?";
        $conn = $conn->prepare($sql);

        $conn->bindValue(1,$ID);

        if($conn->execute()){
            return $conn->fetch(\PDO::FETCH_ASSOC);
        }

        return false;
    }

    public static function buscar_agrupado(): mixed
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT *,isbn_10 as isbn_out, COUNT(*) AS total_exemplares, (SELECT COUNT(isbn_10) FROM exemplar WHERE status = 0 and isbn_10 = isbn_out GROUP BY isbn_10) AS exemplares_disponiveis, (SELECT COUNT(isbn_10) FROM exemplar WHERE status = 1 and isbn_10 = isbn_out GROUP BY isbn_10) AS exemplares_ocupados FROM `exemplar` 
                INNER JOIN titulo as t on exemplar.id_titulo = t.id_titulo 
                INNER JOIN idioma as i on t.id_idioma = i.id_idioma 
                INNER JOIN editora as e on e.id_editora = exemplar.id_editora                                                                                                                                                                                                                                                                                       
                GROUP BY isbn_10";
        $conn = $conn->prepare($sql);

        if($conn->execute())
            return $conn->fetchAll(\PDO::FETCH_ASSOC);

        return false;
    }

//SELECT *,isbn_10 as isbn_out, COUNT(*) AS total_exemplares, (SELECT COUNT(isbn_10) FROM exemplar WHERE status = 0 and isbn_10 = isbn_out GROUP BY isbn_10) AS exemplares_disponiveis, (SELECT COUNT(isbn_10) FROM exemplar WHERE status = 1 and isbn_10 = isbn_out GROUP BY isbn_10) AS exemplares_ocupados FROM `exemplar`
//INNER JOIN titulo as t on exemplar.id_titulo = t.id_titulo
//INNER JOIN idioma as i on t.id_idioma = i.id_idioma
//INNER JOIN editora as e on e.id_editora = exemplar.id_editora
//INNER JOIN lista_de_espera as l on l.id_exemplar = exemplar.id_exemplar
//INNER JOIN pessoa_fisica as p on p.id_pessoa_fisica = l.id_pessoa_fisica
//GROUP BY isbn_10

//    public static function save(Editora $editora): bool
//    {
//        $conn = Conexao::getInstance();
//        $sql = "INSERT INTO EDITORA(nome_editora) VALUES (?)";
//        $conn = $conn->prepare($sql);
//        $conn->bindValue(1, $editora->getNomeEditora());
//
//        return $conn->execute();
//    }
//
//    public static function update(Idioma $idioma): mixed
//    {
//        $conn = Conexao::getInstance();
//        $sql = "UPDATE IDIOMA SET nome_idioma = ? WHERE id_idioma = ?";
//        $conn = $conn->prepare($sql);
//        $conn->bindValue(1, $idioma->getId());
//
//
//        if($conn->execute()){
//            return self::getOne($idioma->getId());
//        }
//
//        return false;
//    }
//
//    public static function delete($id): bool
//    {
//        $conn = Conexao::getInstance();
//
//        $sql = "DELETE FROM IDIOMA WHERE id_idioma = ?";
//        $conn = $conn->prepare($sql);
//        $conn->bindValue(1, $id);
//
//        return $conn->execute();
//    }
}