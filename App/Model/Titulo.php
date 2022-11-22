<?php

namespace App\Model;

use App\DAO\TituloDAO;

final class Titulo
{
    private $id;
    private $nome_titulo;

    /**
     * @param $id
     * @param $nome_titulo
     * @param $paginas_titulo
     */
    public function __construct($id = '', $nome_titulo = '')
    {
        $this->id = $id;
        $this->nome_titulo = $nome_titulo;
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
    public function getNomeTitulo()
    {
        return $this->nome_titulo;
    }

    /**
     * @param mixed $nome_titulo
     */
    public function setNomeTitulo($nome_titulo): void
    {
        $this->nome_titulo = $nome_titulo;
    }

    public static function getAll()
    {
        return TituloDAO::getAll();
    }

    public static function getById($id)
    {
        return TituloDAO::getOne($id);
    }

    public static function save(Titulo $titulo)
    {
        return TituloDAO::save($titulo);
    }

    public static function update(Titulo $titulo)
    {
        return TituloDAO::update($titulo);
    }

    public static function delete($id)
    {
        return TituloDAO::delete($id);
    }


}