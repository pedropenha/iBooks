<?php

namespace App\Model;

use App\DAO\IdiomaDAO;

final class Idioma
{
    private $id;
    private $nome_idioma;

    /**
     * @param $id
     * @param $nome_idioma
     */
    public function __construct($id = '', $nome_idioma = '')
    {
        $this->id = $id;
        $this->nome_idioma = $nome_idioma;
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
    public function getNomeIdioma()
    {
        return $this->nome_idioma;
    }

    /**
     * @param mixed $nome_idioma
     */
    public function setNomeIdioma($nome_idioma): void
    {
        $this->nome_idioma = $nome_idioma;
    }

    public static function getAll()
    {
        return IdiomaDAO::getAll();
    }

    public static function getById($id)
    {
        return IdiomaDAO::getOne($id);
    }

    public static function save(Idioma $idioma)
    {
        return IdiomaDAO::save($idioma);
    }

    public static function update(Idioma $idioma)
    {
        return IdiomaDAO::update($idioma);
    }

    public static function delete($id)
    {
        return IdiomaDAO::delete($id);
    }
}