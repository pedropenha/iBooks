<?php

namespace App\Model;

use App\DAO\IdiomaDAO;

final class Idioma
{
    private $ididiomas;
    private $idioma_nome;

    /**
     * @param $ididiomas
     * @param $idioma_nome
     */
    public function __construct($ididiomas, $idioma_nome)
    {
        $this->ididiomas = $ididiomas;
        $this->idioma_nome = $idioma_nome;
    }

    /**
     * @return mixed
     */
    public function getIdidiomas()
    {
        return $this->ididiomas;
    }

    /**
     * @param mixed $ididiomas
     */
    public function setIdidiomas($ididiomas): void
    {
        $this->ididiomas = $ididiomas;
    }

    /**
     * @return mixed
     */
    public function getIdiomaNome()
    {
        return $this->idioma_nome;
    }

    /**
     * @param mixed $idioma_nome
     */
    public function setIdiomaNome($idioma_nome): void
    {
        $this->idioma_nome = $idioma_nome;
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
        return Idioma::save($idioma);
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