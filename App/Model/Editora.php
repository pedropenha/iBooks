<?php

namespace App\Model;

use App\DAO\EditoraDAO;

final class Editora
{
    private $id;
    private $nome_editora;

    /**
     * @param $id
     * @param $nome_editora
     */
    public function __construct($id = '', $nome_editora = '')
    {
        $this->id = $id;
        $this->nome_editora = $nome_editora;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomeEditora()
    {
        return $this->nome_editora;
    }

    /**
     * @param mixed $nome_editora
     */
    public function setNomeEditora($nome_editora): void
    {
        $this->nome_editora = $nome_editora;
    }

    public static function getAll()
    {
        return EditoraDAO::getAll();
    }

    public static function getById($id)
    {
        return EditoraDAO::getOne($id);
    }

    public static function save(Editora $editora)
    {
        return EditoraDAO::save($editora);
    }

    public static function update(Editora $editora)
    {
        return EditoraDAO::update($editora);
    }

    public static function delete($id)
    {
        return EditoraDAO::delete($id);
    }


}