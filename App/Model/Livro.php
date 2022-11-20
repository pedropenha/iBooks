<?php

namespace App\Model;

use App\DAO\LivroDAO;

final class Livro
{
    public static function getAll()
    {
        return LivroDAO::getAll();
    }

    public static function getById($id)
    {
        return LivroDAO::getOne($id);
    }

//    public static function save(Livro $livro)
//    {
//        return LivroDAO::save($livro);
//    }
//
//    public static function update(Livro $livro)
//    {
//        return LivroDAO::update($livro);
//    }
//
//    public static function delete($id)
//    {
//        return LivroDAO::delete($id);
//    }
}